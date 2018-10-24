<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
* @ORM\Table(name="users")
* @ORM\Entity
*
* @ApiResource()
*/
class User implements UserInterface
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @ORM\Column(type="string", length=25, unique=true)
    * @Assert\NotBlank
    */
    private $username;

    /**
    * @ORM\Column(type="string", length=500)
    */
    private $password;

    /**
    * @ORM\Column(name="is_active", type="boolean")
    */
    private $isActive;

    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="users")
    * @ORM\JoinColumn(nullable=false)
    * @Assert\NotBlank
    */
    private $client;

    public function __construct($username)
    {
        $this->isActive = true;
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {

    }
}
