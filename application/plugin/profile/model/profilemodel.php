<?php

class ProfileModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function check_user_id($user_id)
    {
    	$sql = "SELECT username FROM user WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);
        $user = $query->fetch();
        if (empty($user))
        {
            return false;
        } else {
            return true;
        }
    }

    public function check_inputs_general($name_first, $name_last)
    {
        if (empty($name_first) OR empty($name_last))
        {
            $error[] = 'All fields must be filled out.';
        }
        if (strlen($name_first) > 30 OR strlen($name_last) > 30) 
        {
            $error[] =  'Your name is to long. If this is your actual name, please contact the site adminsitration.';
        }

        if (empty($error))
        {
            return false;
        } else {
            return $error;
        }
    }

    public function check_inputs_password($password, $password_repeat)
    {
        if (empty($password) OR empty($password_repeat))
        {
            $error[] = 'All fields must be filled out.';
        }
        if (strlen($password) > 20 OR strlen($password_repeat) > 20) 
        {
            $error[] =  'Maximum characters for your password is 20. Please choose a smaller password.';
        }
        if ($password != $password_repeat) 
        {
            $error[] = 'Passwords do not match.';   
        }

        if (empty($error))
        {
            return false;
        } else {
            return $error;
        }
    }

    public function check_inputs_username($username)
    {
        if (empty($username))
        {
            $error[] = 'Username must be filled out.';
        }
        if (strlen($username) > 20)
        {
            $error[] =  'Maximum characters for your username is 20. Please choose a smaller username.';
        }
        if (!ctype_alnum($username)) 
        {
        	$error[] =  'Usernames can only contain the characters Aa-Zz and 0-9.';
        }
        if (ctype_space($username)) 
        {
        	$error[] =  'Usernames can not contain spaces.';
        }

        if (empty($error))
        {
            return false;
        } else {
            return $error;
        }
    }

    public function check_username($username)
    {
    	$sql = "SELECT user_id FROM user WHERE username = :username";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username);
        $query->execute($parameters);
        $user = $query->fetch();
        if (empty($user))
        {
            return false;
        } else {
            return true;
        }
    }

    public function update_general($name_first, $name_last, $user_id)
    {
    	$sql = "UPDATE user SET name_first = :name_first, name_last = :name_last WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name_first' => $name_first, ':name_last' => $name_last, ':user_id' => $user_id);
        if($query->execute($parameters))
        {
            return true;
        } else {
            return false;
        }
    }

    public function update_password($password)
    {
    	$sql = "UPDATE user SET password = :password WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':password' => $password);
        if($query->execute($parameters))
        {
            return true;
        } else {
            return false;
        }
    }

    public function update_username($username, $user_id)
    {
    	$sql = "UPDATE user SET username = :username WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':user_id' => $user_id);
        if($query->execute($parameters))
        {
            return true;
        } else {
            return false;
        }
    }

    public function check_avatar($url)
    {
    	$url = filter_var($url, FILTER_SANITIZE_URL);
		if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED) === false) 
		{
            $error[] = 'That is not a valid url.';
        }
        
        if (empty($error))
        {
            return false;
        } else {
            return $error;
        }
    }

    public function update_avatar($url, $user_id)
    {
    	$url = filter_var($url, FILTER_SANITIZE_URL);
    	$sql = "UPDATE user SET avatar = :avatar WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':avatar' => $url, ':user_id' => $user_id);
        if($query->execute($parameters))
        {
            return true;
        } else {
            return false;
        }
    }
}