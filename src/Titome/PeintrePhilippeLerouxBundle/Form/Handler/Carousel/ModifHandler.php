<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Carousel;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Carousel;

class ModifHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $id;




    public function __construct(Form $form, Request $request, EntityManager $em, $id)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
        $this->id      = $id;
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
        if ($carousel->getOrdre() < $this->id)
        {
            $interCarousel = $this->em->getRepository('TitomePeintrePhilippeLerouxBundle:Carousel')
                    ->findBy(array(), array(), $carousel->getOrdre(), $this->id - $carousel->getOrdre());
            
            foreach ($interCarousel as $carouselModif)
            {
                $carouselModif->setOrdre($carouselModif->getOrdre() + 1);
                $this->em->persist($carouselModif);
            }
        }
        $this->em->persist($carousel);
        $this->em->flush();
    }
}