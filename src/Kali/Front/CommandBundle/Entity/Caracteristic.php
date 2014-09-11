<?php

namespace Kali\Front\CommandBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CaracteristicRepository")
 */
class Caracteristic
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var array
     * 
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="caracteristics")
     */
    private $products;
    
    function __construct() {
        $this->products = new ArrayCollection();
    }

    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Caracteristic
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function getProducts() {
        return $this->products;
    }

    public function setProducts($products) {
        $this->products = $products;
    }


}
