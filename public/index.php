<?php
session_start();
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
define('PLUGIN', ROOT . 'application/plugin' . DIRECTORY_SEPARATOR);
define('HEADER', ROOT . 'application/view/_templates/internal/header.php');
define('FOOTER', ROOT . 'application/view/_templates/internal/footer.php');
require APP . 'config/config.php';
require APP . 'libs/helper.php';
require APP . 'core/application.php';
require APP . 'core/controller.php';
$app = new Application();
