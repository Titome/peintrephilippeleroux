<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Carousel;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Carousel;

class AjoutHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $image;
    
    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
        $this->image   = new Carousel;
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
    
    public function onSuccess(Carousel $carousel)
    {
        $nom = uniqid().'-'.$carousel->getFile()->getClientOriginalName();
        
        $carousel->setImage($nom);
        $carousel->getFile()->move(__DIR__.'/../../../../../../web/image', $nom);
        
        $query = $this->em->createQuery('SELECT COUNT(c.id) FROM Titome\PeintrePhilippeLerouxBundle\Entity\Carousel c');
        $carousel->setOrdre($query->getSingleScalarResult() + 1);
        
        $this->em->persist($carousel);
        $this->em->flush();
    }
}