<?php
// Задания №1, 2, 3, 4
class Product
{
    public $title;
    public $description;
    public $category;
    public $price;
    public $quantity;
    protected $id;
    protected static $count = 0;

    function __construct($title, $description, $category, $price, $quantity)
    {
        self::$count++;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    
    function getProduct(){
        // получение продукта из бд
        echo "Получаем продукт ". $this -> id . " из базы данных<br>";
        echo "Название:  ". $this->title  . " <br>";
        echo "Описание:  ". $this->description  . " <br>";
        echo "Категория:  ". $this->category . "  <br>";
        echo "Цена:  ". $this->price  . " <br>";
        echo "Количество:  ". $this->quantity  . " <br>";
    }

    function saveProduct(){
        // запись продукта в бд
        echo "Продукт сохранен в базу данных под id = ". self::$count ."<br>";
        $this -> id = self::$count;
    }

    function discount(){
        // применение скидки
        echo "Применяем скидку к продукту self::id";
    }
}

class Food extends Product {
    public $shelf_life;

    function __construct($title, $description, $category, $price, $quantity, $shelf_life)
    {
        parent::__construct($title, $description, $category, $price, $quantity);
        $this->shelf_life = $shelf_life;
    }

    function getProduct(){
        // получение продукта из бд
        parent::getProduct();
        echo "Срок годности:  ". $this->shelf_life  . " <br><br>";
    }
}

class Сlothes extends Product {
    public $size;

    function __construct($title, $description, $category, $price, $quantity, $size)
    {
        parent::__construct($title, $description, $category, $price, $quantity);
        $this->size = $size;
    }

    function getProduct(){
        // получение продукта из бд
        parent::getProduct();
        echo "Размер:  ". $this->size  . " <br><br>";
    }
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $coffe = new Food("Jardin", "Кофе средней обжарки", "В зернах", "250", "10", "12");
        $coffe -> saveProduct();
        $coffe -> getProduct();

        $coffe2 = new Food("Lavazza", "Кофе средней обжарки", "В зернах", "360", "15", "12");
        $coffe2 -> saveProduct();
        $coffe2 -> getProduct();

        $t_shirt = new Сlothes("Футболка", "С рисунком", "Мужские", "850", "5", "XXL");
        $t_shirt -> saveProduct();
        $t_shirt -> getProduct();
    ?>
</body>
</html>