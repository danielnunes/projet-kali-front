<?php

namespace Kali\Back\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Kali\Back\ProductBundle\Entity\Command;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_client")
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\OneToOne(targetEntity="User", inversedBy="client")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="boolean", nullable = true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable = true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable = true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable = true)
     */
    private $address;

    /**
     *
     * @ORM\Column(name="birthDate", type="date", nullable=true, nullable = true)
     */
    private $birthDate;

    /**
     *
     * @ORM\Column(name="createDate", type="datetime", nullable=true, nullable = true)
     */
    private $createDate;

    /**
     *
     * @ORM\Column(name="lastUpdateDate", type="datetime", nullable=true)
     */
    private $lastUpdateDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="postalCode", type="integer", nullable = true)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable = true)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="string", nullable = true)
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="mobilePhone", type="string", nullable = true)
     */
    private $mobilePhone;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Kali\Back\ProductBundle\Entity\Command", mappedBy="user")
     */
    private $commands;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commands = new ArrayCollection();
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
     * Set gender
     *
     * @param boolean $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return User
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return User
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     * @return User
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return integer
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     * @return User
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Add commands
     *
     * @param Command $commands
     * @return User
     */
    public function addCommand(Command $commands)
    {
        $this->commands[] = $commands;

        return $this;
    }

    /**
     * Remove commands
     *
     * @param Command $commands
     */
    public function removeCommand(Command $commands)
    {
        $this->commands->removeElement($commands);
    }

    /**
     * Get commands
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Set user
     *
     * @param user $user
     * @return Client
     */
    public function setUser(user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return user
     */
    public function getUser()
    {
        return $this->user;
    }
}
