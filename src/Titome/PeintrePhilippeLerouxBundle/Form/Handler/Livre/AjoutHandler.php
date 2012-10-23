<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Livre;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Livre;

class AjoutHandler
{
	protected $form;
	protected $request;
	protected $em;
	protected $livre;


	public function __construct(Form $form, Request $request, EntityManager $em)
	{
		$this->form    = $form;
		$this->request = $request;
		$this->em 	   = $em;
		$this->livre   = new Livre;
	}

	public function process()
	{
		if ($this->request->getMethod() == 'POST')
		{
			$this->form->bindRequest($this->request);

			if ($this->form->isValid())
			{
				return $this->onSuccess($this->form->getData());;
			}
		}

		return false;
	}

	public function onSuccess(Livre $livre)
	{
		$nom = uniqid().'-'.$livre->getFile()->getClientOriginalName();

		$livre->setCouverture($nom);
		$livre->getFile()->move(__DIR__.'/../../../../../../web/image', $nom);

		$this->em->persist($livre);
		$this->em->flush();

		return $livre->getId();
	}
}