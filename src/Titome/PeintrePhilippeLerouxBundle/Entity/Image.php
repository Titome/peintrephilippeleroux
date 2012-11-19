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
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var text $legende
     * 
     * @ORM\Column(name="legende", type="text", nullable=true)
     */
    private $legende;
    
    /**
     * @var datetime $creat
     *
     * @ORM\Column(name="creat", type="datetime")
     */
    private $creat;
    
    /**
     * @var integer $ordre
     * 
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;


    /**
     * @Assert\Image 
     */
    private $file;


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
     * Set titre
     *
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
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

    /**
     * Set legende
     *
     * @param text $legende
     */
    public function setLegende($legende)
    {
        $this->legende = $legende;
    }

    /**
     * Get legende
     *
     * @return text 
     */
    public function getLegende()
    {
        return $this->legende;
    }
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return Image
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    
        return $this;
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
}