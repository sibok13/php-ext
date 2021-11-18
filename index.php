<?php
    //запуск сессии
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login"><a href="login.php">Вход в аккаунт</a></div>
    <div class="container">
        <h1>Каталог товаров</h1>
        <div class="cards-box">
        </div>
        <button class="next">Показать еще</button>
    </div>

<script>
    let page = 0;
    
    function mag(){
        (async () => {
            let response = await fetch("http://gb.dv/requests.php?page=" + page + ",3");
            let goods = await response.json();
            let out = '';
            for (let key in goods) {
                out+=`
                    <div class="card">
                    <a href="/detail.php?id=`+ goods[key]['id'] +`">
                        <h2>`+ goods[key]['title'] +`</h2>
                        <div class="img-box"><img class="card-img" src="`+ goods[key]['url'] +`"></div>
                    </a>
                    <div class="price">`+ goods[key]['price'] +` &#8381;</div>
                    <div class="description">`+ goods[key]['description'] +`</div>
                    <div class="btn"><a href="/detail.php?id=`+ goods[key]['id'] +`">Подробнее ...</a></div>
                </div>`
                ;
            }
            let shop = document.getElementsByClassName('cards-box')[0];
            shop.innerHTML += out;
        })()
    }

    mag();

    let btn = document.getElementsByClassName('next')[0];
    btn.addEventListener("click", function(){
        page += 3;
        mag();
    });

</script>
</body>
</html>