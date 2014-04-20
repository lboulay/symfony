<?php
// src/Dragoon/AdminBundle/Entity/FicheStar.php
 
namespace Dragoon\AdminBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 */
class StarJob
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
     * @var \Doctrine\Common\Collections\ArrayCollection
     
     * @ORM\ManyToOne(targetEntity="Dragoon\AdminBundle\Entity\Star")
     */
    private $star;
   
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     
     * @ORM\ManyToOne(targetEntity="Dragoon\AdminBundle\Entity\Job")
     */
    private $job;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToOne(targetEntity="Dragoon\AdminBundle\Entity\Fiche", inversedBy="stars", cascade={"remove"})
     * @ORM\JoinColumn(name="fiche_id", referencedColumnName="id")
     */
    private $fiche;
 
    
    /**
     * __toString()
     * 
     * @return string
     */
    public function __toString() {
     	  return $this->star.' ('.$this->job.')';
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
     * Set star
     *
     * @param \Dragoon\AdminBundle\Entity\Star $star
     * @return FicheStar
     */
    public function setStar(\Dragoon\AdminBundle\Entity\Star $star)
    {
        $this->star = $star;
    
        return $this;
    }

    /**
     * Get star
     *
     * @return \Dragoon\AdminBundle\Entity\Star 
     */
    public function getStar()
    {
        return $this->star;
    }

    /**
     * Set job
     *
     * @param \Dragoon\AdminBundle\Entity\Job $job
     * @return FicheStar
     */
    public function setJob(\Dragoon\AdminBundle\Entity\Job $job)
    {
        $this->job = $job;
    
        return $this;
    }

    /**
     * Get job
     *
     * @return \Dragoon\AdminBundle\Entity\Job 
     */
    public function getJob()
    {
        return $this->job;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        
    }
    
    /**
     * Set fiche
     *
     * @param \Dragoon\AdminBundle\Entity\Fiche $fiche
     * @return StarJob
     */
    public function setFiche(\Dragoon\AdminBundle\Entity\Fiche $fiche)
    {
        $this->fiche = $fiche;
    
        return $this;
    }

    /**
     * Get fiche
     *
     * @param \Dragoon\AdminBundle\Entity\Fiche $fiche
     */
    public function getFiche(\Dragoon\AdminBundle\Entity\Fiche $fiche)
    {
        return $this->fiche;
    }
}