<?php
/**
 * namespace
 */
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
    * @ORM\Column(type="string")
    */
    protected $othername;

    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Address", mappedBy="user", cascade={"persist", "remove"})
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $address;

    /**
     * Get address
     * @return \Application\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set Address
     * @param \Application\Entity\Address $address
     * @return $this
     */
    public function setAddress(\Application\Entity\Address $address) {
        $this->address->add($address);
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setOtherName($othername) {
        $this->othername = $othername;
        return $this;
    }
    /**
     * Construct method
     */
    public function __construct() {
        $this->address = new ArrayCollection();
        return $this;
    }
}