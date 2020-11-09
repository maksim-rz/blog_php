<?php

interface Next{
    public function nextMethod();
}

interface Product {
    public function doEcho1();

    public function doEcho2();
}

class MyClass{

}

abstract class ShopProduct {
    public const TEST_CONST = 'test165465444';

    static public $count = 79;
    public $price = 25;
    protected $title;
    protected $producerName;
    private $uid = 25;

    public function __construct(?string $title)
    {
        $this->title = trim($title);
    }

    abstract public function getTitle(): ?string;


    public function doEcho()
    {
        echo 'Hello from ShopProduct ';
    }

    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    public static function testStatic()
    {
        return static::$count;
    }
}

class TvSet extends ShopProduct implements Product, Next
{
    public static $stField;
    public $price = 15;
    public $dimention;
    public $wiFi;

    public function __construct()
    {
    }

    public function getTitle(): ?string
    {
        return 123;
    }

    public function doEcho1()
    {
    }

    public function doEcho2()
    {
    }

    public function nextMethod()
    {
    }
}

class Phone extends ShopProduct {

    public function __construct(?string $title, ?string $twoSim)
    {
        $this->twoSim = $twoSim;
    }


    public function doEcho()
    {
        echo 'Hello from Phone ';
        parent::doEcho();
    }

    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    public $twoSim;

    public function setProducerName($producer)
    {
        $this->producerName = $producer;
    }



    public function getTitle(): ?string
    {
        return $this->title;
    }
}




//$product1 = new ShopProduct('First product');
//$product2 = new ShopProduct('Second product');
$phone = new Phone('Phone', 'yes');

$tv = new TvSet("Tv");

$phone->setProducerName('samsung');


$tv->doEcho();
$phone->doEcho();

//$product1->price = 25;


//$phone::$count = 88;


var_dump($phone, $tv);