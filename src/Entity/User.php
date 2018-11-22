<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
*       "post"={"route_name"="user_post"}
*       },
*   itemOperations={
*       "get"={"route_name"="user_get"},
*       "delete"={"route_name"="user_delete"}
*       }
* )
*/
class User
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
    private $name;

    /**
    * @ORM\ManyToOne(targetEntity="Client", inversedBy="users")
    * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
    * @Assert\NotBlank
    */
    private $client;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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
}
