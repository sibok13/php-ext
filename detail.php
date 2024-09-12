<?php

    require_once 'db_config.php';

    //запуск сессии
    session_start();


    // добавление в корзину товара
    if($_POST["add-to-card"] !=""){
        if (!$_SESSION['card']) {
            $_SESSION['card'] = [];
        }
        
        array_push($_SESSION['card'], $_POST["add-to-card"]); 
        echo '<script>alert("Товар успешно добавлен в корзину!");</script>';
            
    }

    // сохранение комментария (отзыва)

    if($_POST["user_name"]){
      mysqli_query($link, 'INSERT INTO comments (user_name, comment, id_img) VALUES ("' . $_POST["user_name"] . '", "' . $_POST["comment"] . '", ' . $_GET["id"] . ')');
      }

    // получение товара и увеличение счетчика просмотров

    if($_GET['id'] && is_numeric($_GET['id'])){
        $result = mysqli_query($link, 'SELECT * FROM goods WHERE id =' . $_GET['id']);
        $result_comments = mysqli_query($link, 'SELECT * FROM comments WHERE id_img =' . $_GET['id']);
        mysqli_query($link, 'UPDATE goods SET counter=counter+1 WHERE id =' . $_GET['id']); // увеличиваем счетчик просмотров

        $goods = array();
        while($row = mysqli_fetch_assoc($result)){
            $goods[] = $row;
        }

        // получение комментариев (отзывов)

        $comments = array();
        while($row = mysqli_fetch_assoc($result_comments)){
            $comments[] = $row;
        }
        
        mysqli_close($link);
    }else{
        die('Ошибка! Неверный идентификатор товара.');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $goods[0]['title'] ?></title>
</head>
<body>
    <div class="container">
        <div class="detail-box">
            <div class="detail-main">
                <div class="detail-img"><img src="<?= $goods[0]['url'] ?>"></div>
                <div class="detail-desc">
                    <h1><?= $goods[0]['title'] ?></h1>
                    <div class="price">Цена: <?= $goods[0]['price'] ?> &#8381;</div>
                    <div class="detail-text"><b>Описание:</b><br><?= $goods[0]['description'] ?></div>
                    <div class="text"><b>Количество просмотров:</b> <?= $goods[0]['counter'] ?></div>
                    <div class="add-btn">
                        <form method="POST" action="">
                            <input type="hidden" name="add-to-card" type="text" value="<?= $_GET['id']; ?>">
                            <input type="submit" value="Добавить в корзину">
                        </form>
                        <?php
                            if ($_SESSION['card'] != Null) { ?>
                                <form action="basket.php">
                                    <input type="submit" value="Перейти в корзину">
                                </form>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="detail-footer">
                <div class="detail-footer-header"><u>Отзывы о товаре:</u></div>
                <div>
                    <?php 
                    foreach($comments as $key => $value) { ?>
                        <div class="nik"><b>Имя пользователя:</b> <?= $value['user_name']; ?></div>
                        <div class="messege"><b>Сообщение:</b> <?= $value['comment']; ?></div>
                       <?php } ?>
                    <div class="send-mess">
                        <b>Оставьте отзыв:</b><br><br>
                        <form method="POST" action="">
                        <input name="user_name" type="text" placeholder="Никнейм"><br>
                        <input name="comment" type="text" placeholder="Сообщение"><br>
                        <input type="submit" value="Отправить">
                        </form>
                    </div>
                </div>
                <div class="back"><a href="../">ОБРАТНО</a></div>
            </div>
        </div>
    </div>
</body>
</html>