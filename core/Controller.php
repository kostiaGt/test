<?php

class Controller {

    public $action;
    public $controller;
    public $content;

    public function __construct() {

        $this->controller = strtolower(str_replace('Controller', '', get_class($this)));

        $actionName = 'actionIndex';
        $this->action = 'index';

        $this->init();

        if (isset($_GET['a_']) && !empty($_GET['a_'])) {
            $this->action = strtolower($_GET['a_']);
            $actionName = 'action' . ucfirst($this->action);
        }

        $this->beforeAction();
        $this->$actionName();
    }

    public function render($viewName__, $vars = array()) {

        if ($vars) {
            foreach ($vars as $k => $v) {
                $$k = $v;
            }
        }

        ob_start();
        $viewFile = PATH . '/views/' . $this->controller . '/' . $viewName__ . '.php';
        if (!is_file($viewFile))
            die('файл вида [' . $viewName__ . '] не найден');

        include_once $viewFile;
        $this->content = ob_get_clean();

        include_once PATH . '/views/main.php';
    }

    public function redirect($url, $code = 200, $isTestAction = true) {
         if ($isTestAction && preg_match("/c_\=$this->controller.*a_\=$this->action/", $url))
            return;
        ob_start();
        flush();
        header("Location: $url", false, $code);
        $output = ob_get_contents();
        ob_end_clean();
    }

    public function init() {
        
    }

    public function beforeAction() {

        if ($this->isTimeUserSession())
            unset($_SESSION['user__']);

        if ($this->isAuthFalseTime()) {
            unset($_SESSION['authFalseTime']);
            if (isset($_SESSION['authFalseLength']))
                    unset($_SESSION['authFalseLength']);
        } 
        
        //var_dump($_SESSION['authFalseLength']);
        
        if ($this->isAuthFalseLength()) { 
            $_SESSION['authFalseTime'] = time();
            $this->redirect('/?c_=user&a_=info');
        } else if (!isset($_SESSION['user__']) && !isset($_SESSION['authFalseLength']) && $this->action != 'auth') {
           
            $this->redirect('/?c_=user&a_=auth');
        }
    }
    
    public function isTimeUserSession($time = 3600) {
        return (isset($_SESSION['user__']['time']) && (time() - $_SESSION['user__']['time'] ) > $time);
    }
    
    public function isAuthFalseTime($time = 300) {
        return (isset($_SESSION['authFalseTime']) && (time() - $_SESSION['authFalseTime']) > $time);
    }
    
    public function isAuthFalseLength($length = 2) {
        return (isset($_SESSION['authFalseLength']) && $_SESSION['authFalseLength'] >= $length   && $this->action != 'info');
    }

    public function actionIndex() {
        
    }
    
   

}
