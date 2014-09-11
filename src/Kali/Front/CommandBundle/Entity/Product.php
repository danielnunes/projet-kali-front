<?php

namespace Kali\Front\CommandBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="lenght", type="float")
     */
    private $lenght;
    
    /**
     * @var float
     *
     * @ORM\Column(name="density", type="float")
     */
    private $density;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="float")
     */
    private $width;
   

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float")
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;
    
    /**
     * @var array
     * 
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="product")
     */
    private $pictures;
    
    private $productCommands;
    
    /**
     * @var array
     * 
     * @ORM\ManyToMany(targetEntity="Caracteristic", inversedBy="products")
     * @ORM\JoinTable(name="caracteristic_products")
     */
    private $caracteristics;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="ecoParticipation", type="boolean", nullable=true)
     */
    private $ecoParticipation;
    
    function __construct() {
        $this->pictures = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getLenght() {
        return $this->lenght;
    }

    public function getDensity() {
        return $this->density;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPictures() {
        return $this->pictures;
    }

    public function getProductCommands() {
        return $this->productCommands;
    }

    public function getCaracteristics() {
        return $this->caracteristics;
    }

    public function getEcoParticipation() {
        return $this->ecoParticipation;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setLenght($lenght) {
        $this->lenght = $lenght;
    }

    public function setDensity($density) {
        $this->density = $density;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setPictures($pictures) {
        $this->pictures = $pictures;
    }

    public function setProductCommands($productCommands) {
        $this->productCommands = $productCommands;
    }

    public function setCaracteristics($caracteristics) {
        $this->caracteristics = $caracteristics;
    }

    public function setEcoParticipation($ecoParticipation) {
        $this->ecoParticipation = $ecoParticipation;
    }


}
