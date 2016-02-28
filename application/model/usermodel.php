<?php

class UserModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function info($user_id)
    {
        $sql = "SELECT user_id, email, name_first, name_last, join_date, username, avatar FROM user WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);
        $user = $query->fetch();
        if (empty($user))
        {
            return false;
        } else {
            return $user;
        }
    }

    public function stats($user_id)
    {
        $sql = "SELECT energy_current, energy_max, experiance_current, experiance_max, health_current, health_max, strength_current, defence_current, speed_current, level FROM stats WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);
        $user = $query->fetch();
        if (empty($user))
        {
            return false;
        } else {
            $user->energy_percent = ((100 / $user->energy_max) * $user->energy_current).'%';
            $user->health_percent = ((100 / $user->health_max) * $user->health_current).'%';
            $user->experiance_percent = ((100 / $user->experiance_max) * $user->experiance_current).'%';
            return $user;
        }
    }

    public function currency($user_id)
    {
        $sql = "SELECT cash, bank, points, credits FROM currency WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);
        $user = $query->fetch();
        if (empty($user))
        {
            return false;
        } else {
            return $user;
        }
    }

    public function admin_status()
    {
        $sql = "SELECT admin FROM user WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $_SESSION['user_id']);
        $query->execute($parameters);
        $admin_status = $query->fetch();
        return $admin_status->admin;
    }

    public function logout()
    {
        session_destroy();
    }

    public function is_logged_in()
    {
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }
    }
}
