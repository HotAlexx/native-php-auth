<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Авторизация пользователя. Тестовое задание</title>
</head>
<body>
<h1>Авторизация</h1>
<p>Введите логин и пароль:</p>
<form method="post" action="/?action=login">
    <label>
        Login:
        <input type="text" name="login" value="<?=$login?>"/>
    </label><br/>
    <label>
        Password:
        <input type="password" name="password" value="<?=$password?>"/>
    </label><br/>
    <input type="submit" name="submit"/><br/>
</form>
<?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br/>';
        }
    }
?>
<a href="/?action=registration">Регистрация</a>
</body>
</html>
