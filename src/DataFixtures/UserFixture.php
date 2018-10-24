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
        for($c = 1; $c <= 3; $c++) {
            $client = new Client();
            $client->setName("client$c");
            $manager->persist($client);

            //create 5 user for 1 client
            for($u = 1; $u <= 5; $u++) {
                $user = new User();

                $password = $this->encoder->encodePassword($user, 'test');

                $user->setUsername($client->getName()."user$u");
                $user->setPassword($password);
                $user->setClient($client);

                $manager->persist($user);
            }

            $manager->flush();
        }
    }
}
