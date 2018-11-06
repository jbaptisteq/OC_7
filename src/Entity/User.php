<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
* @ORM\Table(name="users")
* @ORM\Entity
*
* @ApiResource(
*   collectionOperations={
*       "get"={"route_name"="user_list"},
*       "post"={"route_name"="new_user"}
*       },
*   itemOperations={
*       "get"={"route_name"="user_get"},
*       "delete"={"route_name"="user_delete"}
*       },
*   normalizationContext={"groups"={"read"}}
* )
*/
class User implements UserInterface
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @Groups("read")
    */
    private $id;

    /**
    * @ORM\Column(type="string", length=25, unique=true)
    * @Assert\NotBlank
    * @Groups("read")
    */
    private $username;

    /**
    * @ORM\Column(type="string", length=500)
    */
    private $password;

    /**
    * @ORM\Column(name="is_active", type="boolean")
    * @Groups("read")
    */
    private $isActive;

    /**
    * @ORM\ManyToOne(targetEntity="Client", inversedBy="users")
    * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
    * @Assert\NotBlank
    * @Groups("read")
    */
    private $client;

    public function __construct()
    {
        $this->isActive = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
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

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {

    }
}
