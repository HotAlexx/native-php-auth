<?php
require_once('core/Database.php');

class User
{
    public $login;
    public $password;
    public $email;
    public $fio;
    public $errors = [];

    public function auth()
    {
        return false;
    }

    public function validate()
    {
        $no_errors = true;
        if (!isset($this->login) || $this->login == '') {
            $no_errors = false;
            $this->errors['login'] = 'Логин не может быть пустым!';
        }
        if (!isset($this->password) || $this->password == '') {
            $no_errors = false;
            $this->errors['password'] = 'Пароль не может быть пустым!';
        }

        return $no_errors;
    }

    public function save()
    {
        $db = Database::getInstance();
        $sth = $db->pdo->prepare("INSERT INTO `users` SET `login` = :login, `password` = :password");
        $sth->execute(array('login' => 1, 'password' => '222'));
    }
}