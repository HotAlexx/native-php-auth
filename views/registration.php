<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Авторизация пользователя. Тестовое задание</title>
</head>
<body>
<h1>Регистрация</h1>
<p>Введите данные:</p>
<form method="post" action="/?action=registration">
    <label>
        E-mail:
        <input type="text" name="email" value="<?=$email?>"/>
    </label><br/>
    <label>
        Login:
        <input type="text" name="login" value="<?=$login?>"/>
    </label><br/>
    <label>
        Password:
        <input type="password" name="password" value="<?=$password?>"/>
    </label><br/>
    <label>
        Ф.И.О.:
        <input type="text" name="fio" value="<?=$fio?>"/>
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
</body>
</html>
