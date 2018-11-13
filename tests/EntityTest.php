<?php

namespace tests\EntityTest;

use App\Entity\Product;
use App\Entity\Client;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

class EntityTest extends TestCase
{

    public function testGetNameProduct()
    {
        $product = new Product();
        $product->setName('name');

        $this->assertSame('name', $product->getName());
    }

    public function testGetCompanyProduct()
    {
        $product = new Product();
        $product->setCompany('company');

        $this->assertSame('company', $product->getCompany());
    }

    public function testGetDescriptionProduct()
    {
        $product = new Product();
        $product->setDescription('description');

        $this->assertSame('description', $product->getDescription());
    }

    public function testGetValueProduct()
    {
        $product = new Product();
        $product->setValue(1000);

        $this->assertSame(1000, $product->getValue());
    }

    public function testGetNameClient()
    {
        $client = new Client();
        $client->setName('name');

        $this->assertSame('name', $client->getName());
    }

    public function testGetUsernameClient()
    {
        $client = new Client();
        $client->setUsername('username');

        $this->assertSame('username', $client->getUsername());
    }

    public function testGetPasswordClient()
    {
        $client = new Client();
        $client->setPassword('password');

        $this->assertSame('password', $client->getPassword());
    }

    public function testGetNameUser()
    {
        $user = new User();
        $user->setName('name');

        $this->assertSame('name', $user->getName());
    }

}
