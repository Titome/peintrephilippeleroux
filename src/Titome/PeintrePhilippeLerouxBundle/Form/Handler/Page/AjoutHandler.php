<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Page;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Page;

class AjoutHandler
{
	protected $form;
	protected $request;
	protected $em;

	public function __construct(Form $form, Request $request, EntityManager $em)
	{
		$this->form    = $form;
		$this->request = $request;
		$this->em 	   = $em;
	}

	public function process()
    {
        if ($this->request->getMethod() == 'POST')
        {
            $this->form->bindRequest($this->request);
            
            if ($this->form->isValid())
            {
                $this->onSuccess($this->form->getData());
                
                return true;
            }
        }
        
        return false;
    }

    public function onSuccess(Page $page)
    {
    	$nom = uniqid().'-'.$page->getFile()->getClientOriginalName();

    	$page->setNom($nom);
    	$page->getFile()->move(__DIR__.'/../../../../../../web/image', $nom);

    	$query = $this->em->createQuery('SELECT COUNT(p.id) FROM Titome\PeintrePhilippeLerouxBundle\Entity\Page p');
    	$page->setNumero($query->getSingleScalarResult() + 1);

    	$this->em->persist($page);
    	$this->em->flush();
    }
}