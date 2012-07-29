<?php

namespace Titome\PeintrePhilippeLerouxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;

/**
 * Titome\PeintrePhilippeLerouxBundle\Entity\Carousel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Titome\PeintrePhilippeLerouxBundle\Entity\CarouselRepository")
 */
class Carousel
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var integer $ordre
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;
    
    /*
     * @Assert\Image
     */
    private $file;
    

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
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile($file)
    {
        $this->file = $file;
    }
}