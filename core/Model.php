<?php

/*
 * Класс модели. 
 * Модель подключается к базе данных
 */

/**
 * Description of Model
 *
 * @author kot
 */
class Model {

    private $_host = 'localhost';
    private $_user = 'root';
    private $_password = '';
    private $_db = 'test';
    protected $_mysqli;

    public function __construct() {

        $this->_mysqli = new mysqli($this->_host, $this->_user, $this->_password, $this->_db);

        if (mysqli_connect_errno()) {
            printf("Ошибка соединения: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function __destruct() {
        $this->_mysqli->close();
    }

}
