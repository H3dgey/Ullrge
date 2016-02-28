<?php

class Home extends Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->UserModel->is_logged_in() === true) {header('Location:'.URL.'explore');exit();}
    }

    public function index()
    {
        require APP . 'view/_templates/external/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/external/footer.php';
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $check_inputs = $this->MasterModel->check_inputs_register($_POST['password'],$_POST['password_repeat'],$_POST['name_first'],$_POST['name_last']);
            if ($check_inputs === false) {
                if ($this->MasterModel->valid_email($_POST['email']) === true) {
                    if ($this->MasterModel->used_email($_POST['email']) === false) {
                        $token = $this->MasterModel->email_token($_POST['name_last']);
                        $password = $this->MasterModel->hash_password($_POST['password'],$_POST['email']);
                        $register_user = $this->MasterModel->register_user($_POST['email'],$password,$_POST['name_first'],$_POST['name_last'], $token);
                        if ($register_user === true) {
                            $this->MasterModel->email_activation($_POST['email'],$_POST['name_first'],$_POST['name_last'],$token);
                            require APP . 'view/_templates/external/header.php';
                            require APP . 'view/home/registered.php';
                            require APP . 'view/_templates/external/footer.php';
                        } else {
                            $error = "Something has gone wrong, pleae try again.";
                            require APP . 'view/_templates/external/header.php';
                            require APP . 'view/home/index.php';
                            require APP . 'view/_templates/external/footer.php';
                        }
                    } else {
                        $error = "That email address is already in use.";
                        require APP . 'view/_templates/external/header.php';
                        require APP . 'view/home/index.php';
                        require APP . 'view/_templates/external/footer.php';
                    }
                } else {
                    $error = "Please use a valid email address.";
                    require APP . 'view/_templates/external/header.php';
                    require APP . 'view/home/index.php';
                    require APP . 'view/_templates/external/footer.php';
                }
            } else {
                $error = $check_inputs;
                require APP . 'view/_templates/external/header.php';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/external/footer.php';
            }
        } else {
            header('Location:'.URL.'home');
            exit();
        }
    }

    public function activate($token)
    {
        if (isset($token)) {
            $check_token  = $this->MasterModel->check_token($token);
            $activate  = $this->MasterModel->activate($check_token);
            require APP . 'view/_templates/external/header.php';
            require APP . 'view/home/activated.php';
            require APP . 'view/_templates/external/footer.php';
            header('Refresh:5; url='.URL.'home');
            exit();
        } else {
            header('Location:'.URL.'home');
            exit();
        }
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $check_inputs_login = $this->MasterModel->check_inputs_login($_POST['password']);
            if ($check_inputs_login === false) {
                if ($this->MasterModel->valid_email($_POST['email']) === true) {
                    $password = $this->MasterModel->hash_password($_POST['password'],$_POST['email']);
                    $login = $this->MasterModel->check_password($password,$_POST['email']);
                    if ($login != false) {
                        if ($login->verified === 'yes') {
                            $this->MasterModel->login($login->user_id);
                            header('Location:'.URL.'explore');
                            exit();
                        } else {
                            $error = "Your account needs to be activated before you can login. Please check your emails.";
                            require APP . 'view/_templates/external/header.php';
                            require APP . 'view/home/index.php';
                            require APP . 'view/_templates/external/footer.php';
                        }
                    } else {
                        $error = "Incorrect Email & Password combination.";
                        require APP . 'view/_templates/external/header.php';
                        require APP . 'view/home/index.php';
                        require APP . 'view/_templates/external/footer.php';
                    }
                } else {
                    $error = "Please use a valid email address.";
                    require APP . 'view/_templates/external/header.php';
                    require APP . 'view/home/index.php';
                    require APP . 'view/_templates/external/footer.php';
                }
            } else {
                $error = $check_inputs;
                require APP . 'view/_templates/external/header.php';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/external/footer.php';
            }
        } else {
            header('Location:'.URL.'home');
            exit();
        }
    }
}
