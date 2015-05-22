<?php

/**
 * Description of Users
 *
 * @author kot
 */
class Users extends Model {

    public function isUser($user, $password) {
       
        if ($res = $this->_mysqli->query("SELECT * FROM users WHERE name = '$user' AND password = PASSWORD('$password')")) {      
           $user_ = $res->fetch_assoc();
           if (isset($user_['password'])) {
               unset($user_['password']);
               $_SESSION['user__'] = $user_;
               $_SESSION['user__']['time'] = time();
               return true;  
           }        
        } 
    
        return false;
    }
    
    public function newPassword($password) {
        if (isset($_SESSION['user__']['id'])) {
            $this->_mysqli->query("UPDATE users SET `password` = PASSWORD('$password') WHERE id = ".$_SESSION['user__']['id']);
        } 
    }

}
