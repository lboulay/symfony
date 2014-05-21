<?php

namespace Dragoon\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * star
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Star
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
     * @var integer
     *
     * @ORM\Column(name="dvdfrId", type="integer", nullable=true)
     */
    private $dvdfrId;
    
    /**
     * __toString()
     * 
     * @return string
     */
    public function __toString() {
     	  return $this->name;
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
     * @return star
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

    /**
     * Set dvdfr_id
     *
     * @param integer $id
     * @return star
     */
    public function setdvdfrId($id)
    {
        $this->dvdfrId = $id;
    
        return $this;
    }

    /**
     * Get dvdfr_id
     *
     * @return integer
     */
    public function getDvdfrId()
    {
        return $this->dvdfrId;
    }
}