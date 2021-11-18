<?php 
    //запуск сессии
    session_start();

    if ($_SESSION['card'] != '') {
        require_once 'db_config.php';
    }

    // удаление товара из корзины
    if($_POST['delete-from-card'] != ''){
        unset($_SESSION['card'][$_POST['delete-from-card']]);
    }

    function get_basket(){
        if ($_SESSION['card'] != Null) {
            $basket_sum = 0;
            foreach ($_SESSION["card"] as $key => $value) {
                global $link;
                $result = mysqli_query($link, 'SELECT * FROM goods WHERE id =' . $value);
                $good = array();
                while($row = mysqli_fetch_assoc($result)){
                    $good[] = $row;
                } ?>

                <div class="basket-row">
                    <div class="basket-item"><img src="<?= $good[0]['url'] ?>"></div>
                    <div class="basket-item"><?= $good[0]['title'] ?></div>
                    <div class="basket-item"><?= $good[0]['price'] ?> &#8381;</div>
                    <div class="basket-item">
                            <form method="POST" action="">
                                <input type="hidden" name="delete-from-card" type="text" value="<?= $key ?>">
                                <input type="submit" value="Удалить">
                            </form>
                    </div>
                </div>

            <?php
            $basket_sum += $good[0]['price'];
            } ?>
                <div class="basket-row">
                    <div class="basket-summ">ИТОГО: <?= $basket_sum ?> &#8381;</div>
                </div>
        <?php
        mysqli_close($link);
        }else{ ?>
            <div class="basket-row"><div class="basket-empty">Нет товаров в корзине. </div></div>
            <div class="basket-row"><div class="basket-summ">ИТОГО: 0.00 &#8381;</div></div>
        <?php }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Корзина</title>
</head>
<body>
    <div class="container">
        <h1>Ваша корзина</h1>
        <div class="basket-box">
            <div class="basket-row">
                <div class="basket-heder">Фото товара</div>
                <div class="basket-heder">Наименование</div>
                <div class="basket-heder">Стоимость</div>
                <div class="basket-heder">Действия</div>
            </div>
            <?php get_basket() ?>
        </div>
        <div class="back"><a href="../">ОБРАТНО</a></div>
    </div>
</body>
</html>