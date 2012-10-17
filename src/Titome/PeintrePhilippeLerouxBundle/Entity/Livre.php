<?php

namespace Titome\PeintrePhilippeLerouxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Titome\PeintrePhilippeLerouxBundle\Entity\Livre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Titome\PeintrePhilippeLerouxBundle\Entity\LivreRepository")
 */
class Livre
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
     * @var string $couverture
     *
     * @ORM\Column(name="couverture", type="string", length=255)
     */
    private $couverture;

    /**
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
     * Set nom
     *
     * @param string $nom
     * @return Livre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
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
     * Set couverture
     *
     * @param string $couverture
     * @return Livre
     */
    public function setCouverture($couverture)
    {
        $this->couverture = $couverture;

        return $this;
    }

    /**
     * Get couverture
     *
     * @return string
     */
    public function getCouverture()
    {
        return $this->couverture;
    }

    /**
     * Set file
     *
     * @param file $file
     * @return Libre
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return file
     */
    public function getFile()
    {
        return $this->file;
    }
}
