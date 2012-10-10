<?php

namespace Titome\PeintrePhilippeLerouxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titome\PeintrePhilippeLerouxBundle\Entity\Actu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Titome\PeintrePhilippeLerouxBundle\Entity\ActuRepository")
 */
class Actu
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
     * @var string $actu
     *
     * @ORM\Column(name="actu", type="text")
     */
    private $actu;


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
     * Set actu
     *
     * @param string $actu
     * @return Actu
     */
    public function setActu($actu)
    {
        $this->actu = $actu;
    
        return $this;
    }

    /**
     * Get actu
     *
     * @return string 
     */
    public function getActu()
    {
        return $this->actu;
    }
}
