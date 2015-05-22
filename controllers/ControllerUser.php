<?php

/**
 * Description of ControllerUser
 *
 * @author kot
 */
class ControllerUser extends Controller {

    public function actionAuth() {
        $errorMessage = '';
        $name = "";

        if (isset($_SESSION['user__']) && $this->action != 'user' && $this->action != 'profile')
            $this->redirect('/?c_=user&a_=profile');

        if (isset($_POST['name']) && isset($_POST['password'])) {
            $name = $_POST['name'];

            if (empty($name))
                $errorMessage = 'Поле [<strong>Имя</strong>] не должно быть пустым';

            else if (strlen($name) < 3)
                $errorMessage = 'Поле [<strong>Имя</strong>] минимум 3 символа';

            else if (empty($_POST['password']))
                $errorMessage = 'Поле [<strong>Пароль</strong>] не должно быть пустым';

            else if (strlen($_POST['password']) < 8)
                $errorMessage = 'Поле [<strong>Пароль</strong>] минимум 8 символов';

            //   else if (!preg_match('/[a-z]+[A-Z]+/', $_POST['password']))
            //      $errorMessage = 'Поле [<strong>Пароль</strong>] должно содержать большие и маленькие буквы';
            //var_dump($_POST['password']); die;
            include_once 'Users.php';

            $users = new Users();

            if (!$users->isUser($name, $_POST['password'])) {
                $_SESSION['authFalseLength'] = (!isset($_SESSION['authFalseLength']) ? 1 : $_SESSION['authFalseLength'] + 1);
                $errorMessage = 'Пользователь [<strong>' . $name . '</strong>] не найден';
            } else {
                $this->redirect("/?c_=user&a_=profile");
            }
        }

        $this->render('auth', array('errorMessage' => $errorMessage, 'name' => $name));
    }

    public function actionInfo() {
        $this->render('info');
    }

    public function actionProfile() {
        $this->render('profile');
    }

    public function actionNewpassword() {
        $message = '';

        if (isset($_GET['status']) && $_GET['status'] == 'ok') 
            $message = 'Пароль изменен';
        

        if (isset($_POST['password']) && isset($_POST['password_confirm'])) {

            if (empty($_POST['password']))
                $message = 'Поле [<strong>Пароль</strong>] не должно быть пустым';

            else if (strlen($_POST['password']) < 8)
                $message = 'Поле [<strong>Пароль</strong>] минимум 8 символов';

            else if (!preg_match('/[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]+/', $_POST['password']))
                $message = 'Поле [<strong>Пароль</strong>] должно содержать большие и маленькие буквы';

            else if ($_POST['password'] != $_POST['password_confirm'])
                $message = 'Пароли не совпадают';
            else {
                include_once 'Users.php';

                $users = new Users();
                $users->newPassword($_POST['password_confirm']);
               
                $this->redirect('/?c_=user&a_=newpassword&status=ok', 200, false);
            }
        }

        $this->render('newpassword', array('message' => $message));
    }

    public function actionLogout() {

        if (isset($_SESSION['authFalseLength']))
            unset($_SESSION['authFalseLength']);

        if (isset($_SESSION['authFalseTime']))
            unset($_SESSION['authFalseTime']);

        if (isset($_SESSION['user__']))
            unset($_SESSION['user__']);

        $this->redirect('/');
    }

}
