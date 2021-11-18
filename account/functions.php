<?php

function profile(){
    if ($_POST['account'] == 'exit') {
        setcookie('authorized', null, -1, '/'); 
        setcookie('user_name', null, -1, '/');
        header('Location: ../index.php ');
    }

    if($_COOKIE['authorized'] == 'true' && isset($_COOKIE['user_name'])){
        require_once '../db_config.php';
        $result = mysqli_query($link, 'SELECT * FROM users WHERE login = "' . $_COOKIE['user_name'] .'"');
        $user = '';
        while($row = mysqli_fetch_assoc($result)){
            $user = $row;
        }

        echo '<div style="width:100%; text-align:center;">Здравствуйте, ' . $user['user_name'] . ', рады вас видеть!</div>';
        echo '<div style="width:100%; text-align:center;"><a href="../index.php">В магазин!</a></div>';
        echo '<div style="width:100%;"></div>';
        ?>
        
        <?php
        mysqli_close($link);
    }else{
        echo 'Вы не авторизованы! Авторизуйтесь тут: <a href="../login.php">страница логина</a>';
    }
}