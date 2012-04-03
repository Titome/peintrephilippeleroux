<?php

namespace Titome\PeintrePhilippeLerouxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Titome\PeintrePhilippeLerouxBundle\Entity\Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Titome\PeintrePhilippeLerouxBundle\Entity\ImageRepository")
 */
class Image
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string $path
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var datetime $creat
     *
     * @ORM\Column(name="creat", type="datetime")
     */
    private $creat;
    
    /**
     * @Assert\Image 
     */
    public $file;


    public function __construct()
    {
        $this->setCreat(new \DateTime);
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
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set creat
     *
     * @param datetime $creat
     */
    public function setCreat($creat)
    {
        $this->creat = $creat;
    }

    /**
     * Get creat
     *
     * @return datetime 
     */
    public function getCreat()
    {
        return $this->creat;
    }
}