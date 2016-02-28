<?php

class Profile extends Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->UserModel->is_logged_in() != true) {header('Location:'.URL.'home');exit();}
    }
    
    public function index($user_id)
    {
        if (isset($user_id)) {
            if ($this->ProfileModel->check_user_id($user_id) === true) {
                $user = $this->UserModel->info($user_id);
                $stats = $this->UserModel->stats($user_id);
                require HEADER;
                require PLUGIN . 'profile/view/index.php';
                require FOOTER;
            } else {
                require HEADER;
                require PLUGIN . 'profile/view/none.php';
                require FOOTER;
            }
        } else {
           header('Location:'.URL.'profile/edit');
           exit();
        }
    }

    public function edit()
    {
        $user = $this->UserModel->info($_SESSION['user_id']);
        $stats = $this->UserModel->stats($_SESSION['user_id']);
        require HEADER;
        require PLUGIN . 'profile/view/edit.php';
        require FOOTER;
    }

    public function general()
    {
        $user = $this->UserModel->info($_SESSION['user_id']);
        if (isset($_POST['submit'])) {
            $check_inputs = $this->ProfileModel->check_inputs_general($_POST['name_first'], $_POST['name_last']);
            if ($check_inputs === false) {
                $update = $this->ProfileModel->update_general($_POST['name_first'], $_POST['name_last'], $_SESSION['user_id']);
                if ($update === true) {
                    header('Location:'.URL.'profile/edit');
                } else {
                    $error = 'Something went wrong.';
                    require HEADER;
                    require PLUGIN . 'profile/view/edit.php';
                    require FOOTER;
                }
            } else {
                require HEADER;
                require PLUGIN . 'profile/view/edit.php';
                require FOOTER;
            }
        } else {
            header('Location:'.URL.'profile/edit');
            exit();
        }
    }

    public function password()
    {
        $user = $this->UserModel->info($_SESSION['user_id']);
        if (isset($_POST['submit'])) {
            $check_inputs = $this->ProfileModel->check_inputs_password($_POST['password']);
            if ($check_inputs === false) {
                $hashed_password = $this->MasterModel->hash_password($_POST['password'], $user->email);
                $update = $this->ProfileModel->update_password($hashed_password, $_SESSION['user_id']);
                if ($update === true) {
                    header('Location:'.URL.'profile/edit');
                    exit();
                } else {
                    $error = 'Something went wrong.';
                    require HEADER;
                    require PLUGIN . 'profile/view/edit.php';
                    require FOOTER;
                }
            } else {
                require HEADER;
                require PLUGIN . 'profile/view/edit.php';
                require FOOTER;
            }
        } else {
            header('Location:'.URL.'profile/edit');
            exit();
        }
    }

    public function username()
    {
        $user = $this->UserModel->info($_SESSION['user_id']);
        if (isset($_POST['submit'])) {
            $check_inputs = $this->ProfileModel->check_inputs_username($_POST['username']);
            if ($check_inputs === false) {
                $username_taken = $this->ProfileModel->check_username($_POST['username']);
                if ($username_taken === false) {
                    $update = $this->ProfileModel->update_username($_POST['username'], $_SESSION['user_id']);
                    if ($update === true) {
                        header('Location:'.URL.'profile/edit');
                        exit();
                    } else {
                        $error = 'Something went wrong.';
                        require HEADER;
                        require PLUGIN . 'profile/view/edit.php';
                        require FOOTER;
                    }
                } else {
                    $error = 'That username is already taken, choose another.';
                    require HEADER;
                    require PLUGIN . 'profile/view/edit.php';
                    require FOOTER;
                }
            } else {
                require HEADER;
                require PLUGIN . 'profile/view/edit.php';
                require FOOTER;
            }
        } else {
            header('Location:'.URL.'profile/edit');
            exit();
        }
    }

    public function avatar()
    {
        $user = $this->UserModel->info($_SESSION['user_id']);
        if (isset($_POST['submit'])) {
            $check_inputs = $this->ProfileModel->check_avatar($_POST['avatar']);
            if ($check_inputs === false) {
                $update = $this->ProfileModel->update_avatar($_POST['avatar'], $_SESSION['user_id']);
                if ($update === true) {
                    header('Location:'.URL.'profile/edit');
                    exit();
                } else {
                    $error = 'Something went wrong.';
                    require HEADER;
                    require PLUGIN . 'profile/view/edit.php';
                    require FOOTER;
                }
            } else {
                require HEADER;
                require PLUGIN . 'profile/view/edit.php';
                require FOOTER;
            }
        } else {
            header('Location:'.URL.'profile/edit');
            exit();
        }
    }

}
