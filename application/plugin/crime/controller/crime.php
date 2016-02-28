<?php

class Crime extends Controller // This is what connects the plugin work with the rest of the frame work. The "Crime" part is the name of the plugin. No numbers, spaces of specials charactrs, just a-z with the first letter uppercased.
{
    function __construct() // This function will execute before any of the others will. It is a must with any plugin.
    {
        parent::__construct();
        if ($this->UserModel->is_logged_in() != true) {header('Location:'.URL.'home');exit();} //Checks if user is logged in, if they are not, they are returned to the Home Page.
    }
    
    public function index() // Main Function. This is basiclly the plugins homepage.
    {
        $crime = $this->CrimeModel->get_all(); // Makes a call to the Crime Modal and retrieves all the crimes in the database.
        require HEADER; // This is the standard header of all internal (logged in) pages.
        require PLUGIN . 'crime/view/index.php'; // The crimes retrived are then displayed on this page.
        require FOOTER; // This is the standard footer of all internal (logged in) pages.
    }

    public function commit($crime_id) // Another page of the plugin, but with a variable attached to it. This variable come from the url which will look something like htpp://yourgame.com/crime/1 with one being the $crime_id
    {
        if ((isset($crime_id)) && (ctype_digit($crime_id))) { // Checking to make sure $crime_id is actually somethign (#1).
            $crime = $this->CrimeModel->get_single($crime_id); // Making a call to the database to get the details of the crime associated with the $crime_id supplied.
            if (!empty($crime)) { // If the crime exists we continue (#2).
                $stats = $this->UserModel->stats($_SESSION['user_id']); // Get the stats information of the user attempting the crime.
                if ($stats->energy_current >= $crime->energy_cost) { // Check they have enough energy to commit the crime (#3).
                    $commit = $this->CrimeModel->commit($crime->energy_cost, $stats->energy_current, $stats->experiance_current); // Commit the crime.
                    if ($commit = true) { // If the crime is successfully commited, redirect them to the crime homepage and tell them (#4).
                        $crime = $this->CrimeModel->get_all();
                        $message = 'Crime Successful';
                        $error = false;
                        require HEADER;
                        require PLUGIN . 'crime/view/index.php';
                        require FOOTER;   
                    } else { // (#4) If it failed, redirect them to the crime homepage and tell them.
                        $crime = $this->CrimeModel->get_all();
                        $message = 'Crime Failed, Try Again';
                        $error = true;
                        require HEADER;
                        require PLUGIN . 'crime/view/index.php';
                        require FOOTER;
                    }
                } else { // (#3) If they dont have enough energy, redirect them to the crime homepage, also tell them the problem.
                    $crime = $this->CrimeModel->get_all();
                    $message = 'You do not have enough Energy to commit that crime';
                    $error = true;
                    require HEADER;
                    require PLUGIN . 'crime/view/index.php';
                    require FOOTER;
                }
            } else { // (#2) If it does not exsits, we call the homepage insted.
                header('Location:'.URL.'crime');
                exit();
            }
        } else { // (#1) $crime_id has come up empty or isnt a number, so the crime homepage is called instead of attempting a crime.
            header('Location:'.URL.'crime');
            exit();
        }
    }

    public function admin()
    {
        $crime = $this->CrimeModel->get_all();
        if ($this->UserModel->admin_status() != '1') {header('Location:'.URL.'crime');exit();} // Similar to the login check, here we check that the user is a site Admin, if they are they can continue, if they are not then they are redirected to the crime hompage.
        if ((isset($_POST['submit'])) && ($_POST['submit'] === 'Add')) { // Checking to see what the admin is doing. (#5) Here they are trying to add a crime to the database.
            $add = $this->CrimeModel->admin_add();
            if ($add === true) {
                $error = false;
                $message = 'Crime Added';
                require HEADER;
                require PLUGIN . 'crime/view/admin.php';
                require FOOTER;
            } else {
                $error = true;
                $message = 'Something went wrong, try again.';
                require HEADER;
                require PLUGIN . 'crime/view/admin.php';
                require FOOTER;
            }
        } elseif ((isset($_POST['submit'])) && ($_POST['submit'] === 'Edit')) { // (#5) Here they are trying to edit a crime already in the database.
            $edit = $this->CrimeModel->admin_edit();
            if ($edit === true) {
                $error = false;
                $message = 'Crime Edited';
                require HEADER;
                require PLUGIN . 'crime/view/admin.php';
                require FOOTER;
            } else {
                $error = true;
                $message = 'Something went wrong, try again.';
                require HEADER;
                require PLUGIN . 'crime/view/admin.php';
                require FOOTER;
            }
        } elseif ((isset($_POST['submit'])) && ($_POST['submit'] === 'Delete')) { // (#5) Here they are trying to delete a crime already in the database.
            $delete = $this->CrimeModel->admin_delete();
            if ($delete === true) {
                $error = false;
                $message = 'Crime Deleted';
                require HEADER;
                require PLUGIN . 'crime/view/admin.php';
                require FOOTER;
            } else {
                $error = true;
                $message = 'Something went wrong, try again.';
                require HEADER;
                require PLUGIN . 'crime/view/admin.php';
                require FOOTER;
            }
        } else { // They havent done anything yet, so show the adin page.
            require HEADER;
            require PLUGIN . 'crime/view/admin.php';
            require FOOTER;
        }
    }
}