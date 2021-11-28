<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductTest extends WebTestCase {
    public function testProduct(){
        $client = static::createClient();
        $client -> request('GET', '/product');
        $this -> assertResponseStatusCodeSame(200);
        $this -> assertSelectorTextContains('h1', 'Товары');
    }
}