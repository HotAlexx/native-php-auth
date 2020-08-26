<?php


class User
{
    public $login;
    public $password;
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
}