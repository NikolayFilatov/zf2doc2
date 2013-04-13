<?php
/**
 * namespace
 */
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="address")
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string;
     */
    protected $name;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string;
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\User", inversedBy="address");
     */
    protected $user;

    public function setParam($data) {
        $this->name = $data['name'];
        $this->description = $data['desc'];
        $this->user = $data['user'];
        return $this;
    }
    public function setName($name) {
        return $this->name = $name;
    }
    public function setDesc($description) {
        return $this->description = $description;
    }
    public function getName() {
        return $this->name;
    }

}