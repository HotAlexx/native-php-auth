<?php
require_once('core/Database.php');

class User
{
    public $login;
    public $password;
    public $password_hash;
    public $email;
    public $fio;
    public $errors = [];

    public function auth()
    {
        if (isset($_COOKIE['user']) && isset($_COOKIE['password_hash'])) {
            $login = $_COOKIE['user'];
            $user = self::getByLogin($login);
            if ($user && $user->password_hash == $_COOKIE['password_hash']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public static function getByLogin($login)
    {
        $db = Database::getInstance();
        $stmt = $db->pdo->prepare('SELECT * FROM `users` WHERE `login` = :login');
        $stmt->execute(['login' => $login]);
        $user_array = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user_array) {
            $user = new self();
            $user->login = $user_array['login'];
            $user->password_hash = $user_array['password'];
            $user->email = $user_array['email'];
            $user->fio = $user_array['fio'];

            return $user;
        } else {
            return false;
        }
    }

    public function login()
    {
        $user = self::getByLogin($this->login);
        if ($user && $user->password_hash == md5($this->password)) {
            setcookie('user', $user->login);
            setcookie('password_hash', $user->password_hash);
            return true;
        } else {
            $this->errors['login'] = 'Неправильный логин или пароль!';
            return false;
        }
    }

    public function logout()
    {
//        unset($_COOKIE['user']);
//        unset($_COOKIE['password_hash']);
        setcookie("user", "", time() - 3600, "/");
        setcookie("password_hash", "", time() - 3600, "/");
        return true;
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
        $sth = $db->pdo->prepare("INSERT INTO `users` SET `login` = :login, `password` = :password, `email` = :email, `fio` = :fio");
        $sth->execute([
            'login' => $this->login,
            'password' => md5($this->password),
            'email' => $this->email,
            'fio' => $this->fio,
        ]);
    }
}