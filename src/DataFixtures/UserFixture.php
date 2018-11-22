<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Client;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        //create 3 client fake
        for ($c = 1; $c <= 3; $c++) {
            $client = new Client();
            $client->setName("Company$c");
            $client->setUsername("client$c");

            $password = $this->encoder->encodePassword($client, 'test');
            $client->setPassword($password);

            $manager->persist($client);

            //create 5 user for 1 client
            for ($u = 1; $u <= 5; $u++) {
                $user = new User();
                $user->setName($client->getName()."user$u");
                $user->setClient($client);

                $manager->persist($user);
            }

            $manager->flush();
        }
    }
}
