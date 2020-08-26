<?php
require_once('models/User.php');

class BaseController
{
    public $auth_actions = [];

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
            if ($user->validate()) {
                header('Location: /');
            }
        }
        include('views/login.php');
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