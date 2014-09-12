<?php

namespace Kali\Front\CommandBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Kali\Front\CommandBundle\Entity\Client;

/**
 * Command
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CommandRepository")
 */
class Command
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;


    /**
     * @var float
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $senderId;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $userId;

    /**
     * @var array
     
     */
    private $productCommands;
    
    public function getId() {
        return $this->id;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getProductCommands() {
        return $this->productCommands;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setSenderId($senderId) {
        $this->senderId = $senderId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setProductCommands($productCommands) {
        $this->productCommands = $productCommands;
    }
}
