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
     * @var string $legende
     *
     * @ORM\Column(name="legende", type="string", length=255)
     */
    private $legende;

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
     * Set legende
     *
     * @param string $legende
     */
    public function setlegende($legende)
    {
        $this->legende = $legende;
    }

    /**
     * Get legende
     *
     * @return string 
     */
    public function getLegende()
    {
        return $this->legende;
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