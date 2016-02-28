<?php

class Explore extends Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->UserModel->is_logged_in() != true) {header('Location:'.URL.'home');exit();}
    }
    
    public function index()
    {
        require APP . 'view/_templates/internal/header.php';
        require APP . 'view/explore/index.php';
        require APP . 'view/_templates/internal/footer.php';
    }

    public function logout()
    {
        $this->UserModel->logout();
        header('Location:'.URL.'home');
        exit();
    }
}
