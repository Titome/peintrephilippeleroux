<?php

namespace Titome\PeintrePhilippeLerouxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titome\PeintrePhilippeLerouxBundle\Entity\Expo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Titome\PeintrePhilippeLerouxBundle\Entity\ExpoRepository")
 */
class Expo
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
     * @var string $expo
     *
     * @ORM\Column(name="expo", type="text")
     */
    private $expo;


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
     * Set expo
     *
     * @param string $expo
     * @return Expo
     */
    public function setExpo($expo)
    {
        $this->expo = $expo;
    
        return $this;
    }

    /**
     * Get expo
     *
     * @return string 
     */
    public function getExpo()
    {
        return $this->expo;
    }
}
