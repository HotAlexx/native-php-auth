<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Авторизация пользователя. Тестовое задание</title>
</head>
<body>
<h1>Личный кабинет</h1>
<p>Пользователь: <?=$login?></p>
<p>E-mail: <?=$email?></p>
<form method="post" action="/?action=index">
        Новый пароль:
        <input type="password" name="password" value="<?=$password?>"/>
    </label><br/>
    <label>
        Новое Ф.И.О.:
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
<a href="/?action=logout">Выход</a>
</body>
</html>
