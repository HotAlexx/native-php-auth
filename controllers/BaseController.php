<?php
require_once('models/User.php');

class BaseController
{
    public $auth_actions = ['index'];

    public function index()
    {
        if (isset($_COOKIE['user'])) {
            $login = $_COOKIE['user'];
            $user = User::getByLogin($login);
        } else {
            $user = new User();
        }
        if (isset($_POST['submit'])) {
            $user->fio = $_POST['fio'];
            $user->password = $_POST['password'];
            if ($user->validate()) {
                $user->save();
            }
        }
        if (isset($user->fio)) $fio = $user->fio; else $fio = '';
        if (isset($user->email)) $email = $user->email; else $email = '';
        if (isset($user->login)) $login = $user->login; else $login = '';
        if (isset($user->password)) $password = $user->password; else $password = '';
        if (isset($user->errors)) $errors = $user->errors; else $errors = [];
        include('views/change.php');
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $user = new User();
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            if ($user->validate() && $user->login()) {
                header('Location: /');
            }
        }
        if (isset($user->login)) $login = $user->login; else $login = '';
        if (isset($user->password)) $password = $user->password; else $password = '';
        if (isset($user->errors)) $errors = $user->errors; else $errors = [];
        include('views/login.php');
    }

    public function logout()
    {
        $user = new User();
        $user->logout();
        header('Location: /?action=login');
    }

    public function registration()
    {
        if (isset($_POST['submit'])) {
            $user = new User();
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->email = $_POST['email'];
            $user->fio = $_POST['fio'];
            if ($user->validate()) {
                $user->save();
                include('views/registration_success.php');
            } else {
                $login = $user->login;
                $password = $user->password;
                $email = $user->email;
                $fio = $user->fio;
                $errors = $user->errors;
                include('views/registration.php');
            }
        } else {
            $login = '';
            $password = '';
            $email = '';
            $fio = '';
            $errors = [];
            include('views/registration.php');
        }

    }
}