<?php

class CrimeModel // The model name must be the class name of your controller with the word Model on the end. If it is not, your pugin wont work.
{
    function __construct($db) // This is our database connection coming through to the model for you to use.
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function get_all() // Here we are selecting every crime in the database.
    {
    	$sql = "SELECT * FROM plugin_crime";  
        $query = $this->db->prepare($sql);
        $query->execute();
        $crime = $query->fetchAll();
        return $crime;
    }

    public function get_single($crime_id) // Here we are selecting just one crime from the database by its id number.
    {
        $sql = "SELECT * FROM plugin_crime WHERE crime_id = :crime_id"; 
        $query = $this->db->prepare($sql);
        $parameters = array(':crime_id' => $crime_id);
        $query->execute($parameters);
        $crime = $query->fetch();
        return $crime;
    }

    private function crime_experiance($energy_cost) // The formula to work out how much experiance a user should gain from a crime.
    {
        $experiance = ($energy_cost * 0.65); // This is a basic formula giving the user 65% experiance of what it cost them in energy. ie. if it cost them 10 energy, they would gain 6.5 experiance.
        return $experiance;
    }

    public function commit($energy_cost, $energy_current, $experiance_current) // Here is were the crime is actually commited.
    {
        $chance =  rand(1,3); // Part of the chance formula, we are selecting a number between 1 and 3 (#1).
        $energy_update = ($energy_current - $energy_cost);
        $experiance_gain = $this->crime_experiance($energy_cost);
        $experiance_update = ($experiance_current + $experiance_gain);
        if ($chance != 1) { // (#1) If the chance number does not equal 1, then the crime is succesfull. This gives the user a 2 in 3 chance of being successful.
            $sql = "UPDATE stats SET energy_current = :energy_update, experiance_current = :experiance_update WHERE user_id = :user_id"; // Here we take the users energy and reward them with the experiance.
            $query = $this->db->prepare($sql);
            $parameters = array(':energy_update' => $energy_update, ':experiance_update' => $experiance_update, ':user_id' => $_SESSION['user_id']);
            $query->execute($parameters);
            return true;
        } else { // (#1) The crime has failed.
            $sql = "UPDATE stats SET energy_current = :energy_update WHERE user_id = :user_id"; // Here we just take thier energy.
            $query = $this->db->prepare($sql);
            $parameters = array(':energy_update' => $energy_update, ':user_id' => $_SESSION['user_id']);
            $query->execute($parameters);
            return false;
        }
    }

    public function admin_add() // SQL Query to add crime to the database, called by the admin section.
    {
        $sql = "INSERT INTO plugin_crime (crime_id, name, description, energy_cost) VALUES (NULL, :name, :description, :energy_cost)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $_POST['name'], ':description' => $_POST['description'], ':energy_cost' => $_POST['energy_cost']);
        if($query->execute($parameters))
        {
            return true;
        } else {
            return false;
        }
    }

    public function admin_edit() // SQL Query to edit a crime in the database, called by the admin section.
    {
        $sql = "UPDATE plugin_crime SET name = :name, description = :description, energy_cost = :energy_cost WHERE crime_id = :crime_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $_POST['name'], ':description' => $_POST['description'], ':energy_cost' => $_POST['energy_cost'], ':crime_id' => $_POST['crime_id'],);
        $result = $query->execute($parameters);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function admin_delete() // SQL Query to delete a crime in the database, called by the admin section.
    {
        $sql = "DELETE FROM plugin_crime WHERE crime_id = :crime_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':crime_id' => $_POST['crime_id'],);
        $result = $query->execute($parameters);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}