<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadMasterModel();
        $this->loadUserModel();
        if (isset($_SESSION['user_id'])) {$this->UserInfo = $this->UserModel->info($_SESSION['user_id']);$this->UserStats = $this->UserModel->stats($_SESSION['user_id']);$this->UserCurrency = $this->UserModel->currency($_SESSION['user_id']);}
        $this->loadPluginModel();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * @return object model
     */
    public function loadMasterModel()
    {
        require APP . 'model/mastermodel.php';
        $this->MasterModel = new MasterModel($this->db);
    }

    public function loadUserModel()
    {
        require APP . 'model/usermodel.php';
        $this->UserModel = new UserModel($this->db);
    }

    public function loadPluginModel()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->url_model_controller = isset($url[0]) ? $url[0] : null;
            if (file_exists(PLUGIN . $this->url_model_controller . '/model/' . $this->url_model_controller . 'model.php')) {
                require PLUGIN . $this->url_model_controller . '/model/'.$this->url_model_controller.'model.php';
                $class =  ucfirst($this->url_model_controller).'Model';           
                $this->$class = new $class($this->db);

            }
        }        
    }
}
