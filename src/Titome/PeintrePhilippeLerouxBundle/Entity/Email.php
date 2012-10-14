<?php

namespace Titome\PeintrePhilippeLerouxBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Titome\PeintrePhilippeLerouxBundle\Entity\Image
 */

class Email
{
	/**
	 * @var string $nom
	 */
	private $nom;

	/**
	 * @var string $email
	 */
	private $email;

	/**
	 * @var text $message
	 *
	 * @Assert\NotBlank(message="Vous devez au moins remplir le champ message !")
	 */
	private $message;

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
	 * Set nom
	 *
	 * @param string $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * Get message
	 *
	 * @return text
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Set message
	 *
	 * @param text $message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}
}