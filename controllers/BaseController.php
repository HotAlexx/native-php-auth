<?php
require_once('models/User.php');

class BaseController
{
    public $auth_actions = ['index'];

    public function index()
    {
        echo 'index!';
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
                include('views/registration.php');
            }
        } else {
            include('views/registration.php');
        }

    }
}