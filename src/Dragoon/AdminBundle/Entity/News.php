<?php

namespace Dragoon\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class News
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var User $author
     *
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $author;

    /**
     * @var News $similarNews
     *
     * @ORM\ManyToMany(targetEntity="News")
     * @ORM\JoinTable(name="similar_news",
     *      joinColumns={@ORM\JoinColumn(name="id_news", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_similar_news", referencedColumnName="id")}
     * )
     */
    private $similarNews;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificationDate;

    /**
     * @var boolean $published
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    public function __toString()
    {
        return $this->id.' '.$this->title;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->creationDate = $this->modificationDate = new \DateTime('now');
    }
 
    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->modificationDate = new \DateTime('now');
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
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->similarNews = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return News
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     * @return News
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    
        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime 
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return News
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set author
     *
     * @param \Dragoon\AdminBundle\Entity\User $author
     * @return News
     */
    public function setAuthor(\Dragoon\AdminBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Dragoon\AdminBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add similarNews
     *
     * @param \Dragoon\AdminBundle\Entity\News $similarNews
     * @return News
     */
    public function addSimilarNew(\Dragoon\AdminBundle\Entity\News $similarNews)
    {
        $this->similarNews[] = $similarNews;
    
        return $this;
    }

    /**
     * Remove similarNews
     *
     * @param \Dragoon\AdminBundle\Entity\News $similarNews
     */
    public function removeSimilarNew(\Dragoon\AdminBundle\Entity\News $similarNews)
    {
        $this->similarNews->removeElement($similarNews);
    }

    /**
     * Get similarNews
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSimilarNews()
    {
        return $this->similarNews;
    }
}