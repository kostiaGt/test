<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('PATH', dirname(__FILE__));

if (!isset($_SESSION)) 
    session_start();


set_include_path(get_include_path() . PATH_SEPARATOR . PATH . '/core' . PATH_SEPARATOR . PATH . '/models');

$controllerClass = 'ControllerDefault';

if (isset($_GET['c_']) && !empty($_GET['c_'])) {
    $controllerClass = 'Controller' . ucfirst(strtolower($_GET['c_']));
}

include_once 'Model.php';

$controllerFile = PATH . '/controllers/' . $controllerClass . '.php';

if (is_file($controllerFile)) {
    include_once 'Controller.php';
    include_once $controllerFile;

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass;
    } else {
        die("Контроллер [$controllerClass] не найден");
    }
} else {
    header("Location: /404.html", false, 404);
}
?>
