<?php 

    if($_COOKIE['authorized'] == 'true' && isset($_COOKIE['user_name'])){   
        header('Location: /account/index.php ');
    }

    //авторизация

    if ($_POST['login'] != '') {
        require_once 'db_config.php';

        $result = mysqli_query($link, 'SELECT pass FROM users WHERE login = "' . $_POST['login'] .'"');
        $user = '';
        while($row = mysqli_fetch_assoc($result)){
            $user = $row['pass'];
        }

        //проверка пароля и установка cookie

        if($_POST['pass'] != '' && $_POST['pass'] == $user){
            echo '<script>alert("Вы успешно авторизованы! Сейчас вы будете перенаправлены в Личный кабинет.");</script>';
            setcookie('authorized', 'true', time()+3600*24);
            setcookie('user_name', $_POST['login'], time()+3600*24);
            header('Location: /account/index.php ');
        }else{
            echo '<script>alert("Логин или пароль не верны, попробуйте еще раз.");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Авторизация</h1>
        <div class="cards-box">
            <form action="" method="post">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="pass" placeholder="Пароль">
                <input type="submit" value="Вход">
            </form>
        </div>
    </div>
</body>
</html>