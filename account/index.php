<?php require_once 'functions.php' ?>

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
        <h1>Аккаунт</h1>
        <div class="cards-box">
            <?php profile(); ?>
        </div>
        <?php 
        if (isset($_COOKIE['authorized'])) {
            ?>
            <form method="POST" action="">
                <input type="hidden" name="account" type="text" value="exit">
                <input type="submit" value="ВЫХОД">
            </form>
            <?php
        }
        ?>
    </div>
</body>
</html>