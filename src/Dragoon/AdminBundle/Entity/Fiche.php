<?php

namespace Dragoon\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;	

/**
 * fiche
 *
 * @ORM\Table(name="fiche")
 * @ORM\Entity
 */
class Fiche
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
     * @ORM\Column(name="title_fr", type="string", length=255)
     */
    private $title_fr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_vo", type="string", length=255)
     */
    private $title_vo;

    /**
     * @var string
     *
     * @ORM\Column(name="title_alt_fr", type="string", length=255)
     */
    private $title_alt_fr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_alt_vo", type="string", length=255)
     */
    private $title_alt_vo;

    /**
     * @var string
     *
     * @ORM\Column(name="edition", type="string", length=255)
     */
    private $edition;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sortie", type="date")
     */
    private $sortie;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer")
     */
    private $length;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Dragoon\AdminBundle\Entity\Distributeur", inversedBy="fiches", cascade={"persist"})
     * @ORM\JoinTable(name="fiche_distributeur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="fiche_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="distributeur_id", referencedColumnName="id")
     *   }
     * )
     */
    private $distributeurs;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\ManyToMany(targetEntity="Dragoon\AdminBundle\Entity\Editeur", inversedBy="fiches", cascade={"persist"})
     * @ORM\JoinTable(name="fiche_editeur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="fiche_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="editeur_id", referencedColumnName="id")
     *   }
     * )
     */
    private $editeurs;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Dragoon\AdminBundle\Entity\Studio", inversedBy="fiches", cascade={"persist"})
     * @ORM\JoinTable(name="fiche_studio",
     *   joinColumns={
     *     @ORM\JoinColumn(name="fiche_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="studio_id", referencedColumnName="id")
     *   }
     * )
     */
    private $studios;

    /**
     * @var ArrayCollection $categories
     *
     * @ORM\ManyToMany(targetEntity="Dragoon\AdminBundle\Entity\Category", inversedBy="fiches", cascade={"persist"})
     * @ORM\JoinTable(name="fiche_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="fiche_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $categories;
    
    /**
     * @var ArrayCollection $stars
     *
     * @ORM\OneToMany(targetEntity="Dragoon\AdminBundle\Entity\StarJob", mappedBy="fiche", cascade={"remove","persist"})
     * 
     */
    private $stars;
    
    
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stars = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * __toString()
     * 
     * @return string
     */
    public function __toString() {
     	  return $this->title_fr;
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
     * Set title_fr
     *
     * @param string $titleFr
     * @return movies__fiche
     */
    public function setTitleFr($titleFr)
    {
        $this->title_fr = $titleFr;
    
        return $this;
    }

    /**
     * Get title_fr
     *
     * @return string 
     */
    public function getTitleFr()
    {
        return $this->title_fr;
    }

    /**
     * Set title_vo
     *
     * @param string $titleVo
     * @return movies__fiche
     */
    public function setTitleVo($titleVo)
    {
        $this->title_vo = $titleVo;
    
        return $this;
    }

    /**
     * Get title_vo
     *
     * @return string 
     */
    public function getTitleVo()
    {
        return $this->title_vo;
    }

    /**
     * Set title_alt_fr
     *
     * @param string $titleAltFr
     * @return movies__fiche
     */
    public function setTitleAltFr($titleAltFr)
    {
        $this->title_alt_fr = $titleAltFr;
    
        return $this;
    }

    /**
     * Get title_alt_fr
     *
     * @return string 
     */
    public function getTitleAltFr()
    {
        return $this->title_alt_fr;
    }

    /**
     * Set title_alt_vo
     *
     * @param string $titleAltVo
     * @return movies__fiche
     */
    public function setTitleAltVo($titleAltVo)
    {
        $this->title_alt_vo = $titleAltVo;
    
        return $this;
    }

    /**
     * Get title_alt_vo
     *
     * @return string 
     */
    public function getTitleAltVo()
    {
        return $this->title_alt_vo;
    }

    /**
     * Set edition
     *
     * @param string $edition
     * @return movies__fiche
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    
        return $this;
    }

    /**
     * Get edition
     *
     * @return string 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set sortie
     *
     * @param \DateTime $sortie
     * @return movies__fiche
     */
    public function setSortie($sortie)
    {
        $this->sortie = $sortie;
    
        return $this;
    }

    /**
     * Get sortie
     *
     * @return \DateTime 
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return movies__fiche
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    
        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return movies__fiche
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    
        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return movies__fiche
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return movies__fiche
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }
    
    /**
     * Add categories
     *
     * @param \Dragoon\AdminBundle\Entity\Category $categories
     * @return MoviesHasFiches
     */
    public function addCategory(\Dragoon\AdminBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    
        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Dragoon\AdminBundle\Entity\Category $categories
     */
    public function removeCategory(\Dragoon\AdminBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * Set categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setCategories($categories)
    {
        foreach ($categories as $category) {
            $category->setIdPage($this);
            $this->addEditeur($category);
        }
    }

    /**
     * Add distributeurs
     *
     * @param \Dragoon\AdminBundle\Entity\Distributeur $distributeurs
     * @return Fiche
     */
    public function addDistributeur(\Dragoon\AdminBundle\Entity\Distributeur $distributeurs)
    {
        $this->distributeurs[] = $distributeurs;
    
        return $this;
    }

    /**
     * Remove distributeurs
     *
     * @param \Dragoon\AdminBundle\Entity\Distributeur $distributeurs
     */
    public function removeDistributeur(\Dragoon\AdminBundle\Entity\Distributeur $distributeurs)
    {
        $this->distributeurs->removeElement($distributeurs);
    }

    /**
     * Get distributeurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDistributeurs()
    {
        return $this->distributeurs;
    }

    /**
     * Set distributeurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setDistributeurs($distributeurs)
    {
        foreach ($distributeurs as $distributeur) {
            $distributeur->setIdPage($this);
            $this->addEditeur($distributeur);
        }
    }

    /**
     * Add editeurs
     *
     * @param \Dragoon\AdminBundle\Entity\Editeur $editeurs
     * @return Fiche
     */
    public function addEditeur(\Dragoon\AdminBundle\Entity\Editeur $editeurs)
    {
        $this->editeurs[] = $editeurs;
    
        return $this;
    }

    /**
     * Remove editeurs
     *
     * @param \Dragoon\AdminBundle\Entity\Editeur $editeurs
     */
    public function removeEditeur(\Dragoon\AdminBundle\Entity\Editeur $editeurs)
    {
        $this->editeurs->removeElement($editeurs);
    }

    /**
     * Get editeurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEditeurs()
    {
        return $this->editeurs;
    }

    /**
     * Set editeurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setEditeurs($editeurs)
    {
        foreach ($editeurs as $editeur) {
            $editeur->setIdPage($this);
            $this->addEditeur($editeur);
        }
    }

    /**
     * Add studios
     *
     * @param \Dragoon\AdminBundle\Entity\Studio $studios
     * @return Fiche
     */
    public function addStudio(\Dragoon\AdminBundle\Entity\Studio $studios)
    {
        $this->studios[] = $studios;
    
        return $this;
    }

    /**
     * Remove studios
     *
     * @param \Dragoon\AdminBundle\Entity\Studio $studios
     */
    public function removeStudio(\Dragoon\AdminBundle\Entity\Studio $studios)
    {
        $this->studios->removeElement($studios);
    }

    /**
     * Get studios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudios()
    {
        return $this->studios;
    }

    /**
     * Set studios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setStudios($studios)
    {
        foreach ($studios as $studio) {
            $studio->setIdPage($this);
            $this->addEditeur($studio);
        }
    }

    /**
     * Add categories
     *
     * @param \Dragoon\AdminBundle\Entity\Category $categories
     * @return Fiche
     */
    public function addCategorie(\Dragoon\AdminBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    
        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Dragoon\AdminBundle\Entity\Category $categories
     */
    public function removeCategorie(\Dragoon\AdminBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }
    

    /**
     * Add stars
     *
     * @param \Dragoon\AdminBundle\Entity\StarJob $stars
     * @return Fiche
     */
    public function addStar(\Dragoon\AdminBundle\Entity\StarJob $stars)
    {
        $stars->setFiche($this);
        
        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->stars->contains($stars)) {
            $this->stars->add($stars);
        }
    
        return $this;
    }

    /**
     * Remove stars
     *
     * @param \Dragoon\AdminBundle\Entity\StarJob $stars
     */
    public function removeStar(\Dragoon\AdminBundle\Entity\StarJob $stars)
    {
        $this->stars->removeElement($stars);
    }

    /**
     * Get stars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStars()
    {
        return $this->stars;
    }
    
    /**
     * Set stars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setStars(\Doctrine\Common\Collections\Collection $stars)
    {
        $this->stars = $stars;
    }
}