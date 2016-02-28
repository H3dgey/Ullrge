<?php

class MasterModel
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function check_inputs_register($password, $password_repeat, $name_first, $name_last)
    {
        if (empty($password) OR empty($password_repeat) OR empty($name_first) OR empty($name_last))
        {
            $error[] = 'All fields must be filled out.';
        }
        if ($password != $password_repeat) 
        {
            $error[] = 'Passwords do not match.';   
        }
        if (strlen($password) > 20)
        {
            $error[] =  'Maximum characters for your password is 20. Please choose a smaller password.';
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

    public function used_email($email)
    {
        $sql = "SELECT user_id FROM user WHERE email = :email LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email);
        $query->execute($parameters);
        if (empty($query->fetch()))
        {
            return false;
        } else {
            return true;
        }
    }

    public function valid_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
          return false;
        } else {
          return true;
        }   
    }

    public function email_token($name)
    {
        $bytes = ((rand(10000, 99999)) * (rand(2,4)));
        $bytes = bin2hex($bytes);
        $bytes = $bytes.$name;
        $token = str_shuffle($bytes);
        return $token;
    }

    public function register_user($email, $password, $name_first, $name_last, $token)
    {
        $verified = 'no';
        $join_date = time();
        $sql = "INSERT INTO user (email, password, name_first, name_last, join_date, token, verified) VALUES (:email, :password, :name_first, :name_last, :join_date, :token, :verified)";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email, ':password' => $password, ':name_first' => $name_first, ':name_last' => $name_last, ':join_date' =>$join_date, ':token' => $token, ':verified' => $verified);
        if($query->execute($parameters))
        {
            $last_id = $this->db->lastInsertId();
            $energy_current = '100';
            $energy_max = '100';
            $experiance_current = '100';
            $experiance_max = '100';
            $health_current = '100';
            $health_max = '100';
            $strength_current = '1';
            $defence_current = '1';
            $speed_current = '1';
            $level = '1';
            $sql = "INSERT INTO stats (user_id, energy_current, energy_max, experiance_current, experiance_max, health_current, health_max, strength_current, defence_current, speed_current, level) VALUES (:user_id, :energy_current, :energy_max, :experiance_current, :experiance_max, :health_current, :health_max, :strength_current, :defence_current, :speed_current, :level)";
            $query = $this->db->prepare($sql);
            $parameters = array(':user_id' => $last_id, ':energy_current' => $energy_current, ':energy_max' => $energy_max, ':experiance_current' => $experiance_current, ':experiance_max' => $experiance_max, ':health_current' => $health_current, ':health_max' => $health_max, ':strength_current' => $strength_current, ':defence_current' => $defence_current, ':speed_current' => $speed_current, ':level' => $level);
            if ($query->execute($parameters))
            {
                $cash = '1000';
                $bank = '0';
                $points = '0';
                $credits = '0';
                $sql = "INSERT INTO currency (user_id, cash, bank, points, credits) VALUES (:user_id, :cash, :bank, :points, :credits)";
                $query = $this->db->prepare($sql);
                $parameters = array(':user_id' => $last_id, ':cash' => $cash, ':bank' => $bank, ':points' => $points, ':credits' => $credits);
                if ($query->execute($parameters))
                {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function activate($user_id)
    {
        $sql = "UPDATE user SET verified = 'yes', token = null WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        if($query->execute($parameters))
        {
            return true;
        } else {
            return false;
        }
    }

    public function email_activation($email, $name_first, $name_last, $token)
    {
        $name = $name_first . ' ' . $name_last;
        require APP . 'libs/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = SITE_EMAIL_MAIN;
        $mail->Password = SITE_EMAIL_PASSWORD;
        $mail->setFrom(SITE_EMAIL_MAIN, SITE_NAME);
        $mail->addReplyTo(SITE_EMAIL_MAIN, SITE_NAME);
        $mail->addAddress($email, $name);
        $mail->Subject = SITE_NAME . ' Account Activation';
        $mail->Body = 'To activate your account, please click the link ' . URL. 'home/activate/' . $token;
        $mail->Send();
    }

    public function email_resend_activation()
    {
        //resend activation
    }

    public function check_token($token)
    {
        $sql = "SELECT user_id FROM user WHERE token = :token LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':token' => $token);
        $query->execute($parameters);
        $user_id = $query->fetch();
        if (empty($user_id))
        {
            return false;
        } else {
            return $user_id->user_id;
        }
    }

    public function check_inputs_login($password)
    {
        if (empty($password))
        {
            $error[] = 'All fields must be filled out.';
        }
        if (empty($error))
        {
            return false;
        } else {
            return $error;
        }

    }

    public function hash_password($password, $email)
    {
        return crypt($password, $email);
    }

    public function check_password($password_hashed)
    {
        $sql = "SELECT user_id, verified FROM user WHERE password = :password LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':password' => $password_hashed);
        $query->execute($parameters);
        $user_id = $query->fetch();
        if (empty($user_id))
        {
            return false;
        } else {
            return $user_id;
        }
    }

    public function login($user_id)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_id;
    }
}
