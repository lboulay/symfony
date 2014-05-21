<?php

namespace Dragoon\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * dvdfr
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dvdfr
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string $xml
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $xml;
    
    /**
     * __toString()
     * 
     * @return string
     */
    public function __toString() {
     	  return $this->name;
    }
    
    /**
     * Set id
     *
     * @param string $id
     * @return dvdfr
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * Set xml
     *
     * @param string $xml
     * @return dvdfr
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
    
        return $this;
    }

    /**
     * Get xml
     *
     * @return string 
     */
    public function getXml()
    {
        return $this->xml;
    }
}