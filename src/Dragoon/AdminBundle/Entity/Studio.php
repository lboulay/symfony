<?php

namespace Dragoon\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * studio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Studio
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
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Dragoon\AdminBundle\Entity\Fiche", mappedBy="studios")
     * 
     */
    private $fiches;
    
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
     * @return movies__studio
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
}