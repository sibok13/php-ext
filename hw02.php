<?php

// Задание 1. Создать структуру классов ведения товарной номенклатуры.
// Есть абстрактный товар;
// Есть цифровой товар, штучный физический товар и товар на вес;
// У каждого есть метод подсчета финальной стоимости;
// У цифрового товара стоимость постоянная. У штучного товара стоимость зависит от количества штук, 
// у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном 
// итоге доход с продаж.
// Что можно вынести в абстрактный класс, наследование?

abstract class AbstractProduct
{
    protected $title;
    protected $price;

    function __construct($title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }
    
    abstract public function get_total(); //получение финальной стоимости

    abstract public function get_marja(); //подсчет прибыли

}

class DigitalProduct extends AbstractProduct {

    protected $tax;

    function __construct($title, float $price, int $tax)
    {
        parent::__construct($title, $price);
        $this->tax = $tax;
    }

    public function get_total(){
        echo 'Итого цена: ' . $this->price . '<br>';
    }

    public function get_marja(){
        echo 'Прибыль: ' . ($this -> price - ($this -> price * $this -> tax / 100)) . '<br>';
    }

}

class PieceProduct extends AbstractProduct {

    protected $tax;
    protected $count;

    function __construct($title, float $price, int $count, int $tax)
    {
        parent::__construct($title, $price);
        $this->tax = $tax;
        $this->count = $count;
    }

    public function get_total(){
        echo 'Итого цена: ' . $this->price * $this->count . '<br>';
    }

    public function get_marja(){
        echo 'Прибыль: ' . ($this -> price * $this->count - ($this -> price *  $this->count * $this -> tax / 100)) . '<br>';
    }

}

class WeightProduct extends AbstractProduct {

    protected $tax;
    protected $weight;

    function __construct($title, float $price, float $weight, int $tax)
    {
        parent::__construct($title, $price);
        $this->tax = $tax;
        $this->weight = $weight;
    }

    public function get_total(){
        echo 'Итого цена: ' . $this->price * $this->weight . '<br>';
    }

    public function get_marja(){
        echo 'Прибыль: ' . ($this -> price * $this->weight - ($this -> price *  $this->weight * $this -> tax / 100)) . '<br>';
    }

}

$game = new DigitalProduct("NFS", 800, 20);
$game -> get_total();
$game -> get_marja();

$noutbook = new PieceProduct("ASUS", 28000, 2, 18);
$noutbook -> get_total();
$noutbook -> get_marja();

$candies = new WeightProduct("Ромашки", 480, 1.5, 18);
$candies -> get_total();
$candies -> get_marja();

// *Задание 2. Реализовать паттерн Singleton при помощи traits.

trait Singletone {
    private static $run;

    private function __construct(){
        echo "Hello!";
    }

    public static function getTodo(){
        if (self::$run == null) {
            self::$run = new self();
        }

        return self::$run;

    }
}

class MySingletone{
    use Singletone;
}

$singl = MySingletone::getTodo();
