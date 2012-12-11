<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;

class ModifOrdreHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $ordre;
    
    public function __construct(Form $form, Request $request, EntityManager $em, $ordre)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
        $this->ordre   = $ordre;
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
    
    public function onSuccess(Image $image)
    {
        if ($image->getOrdre() < $this->ordre)
        {
            $interImage = $this->em->getRepository('TitomePeintrePhilippeLerouxBundle:Image')
                    ->findBy(array(), array('ordre' => 'asc'), $this->ordre - $image->getOrdre(), $image->getOrdre() - 1);
            
            foreach ($interImage as $imageModif)
            {
                $imageModif->setOrdre($imageModif->getOrdre() + 1);
                $this->em->persist($imageModif);
            }
        }
        elseif ($image->getOrdre() > $this->ordre)
        {
            $interImage = $this->em->getRepository('TitomePeintrePhilippeLerouxBundle:Image')
                    ->findBy(array(), array('ordre' => 'asc'), $image->getOrdre() - $this->ordre, $this->ordre);
            
            foreach ($interImage as $imageModif)
            {
                $imageModif->setOrdre($imageModif->getOrdre() - 1);
                $this->em->persist($imageModif);
            }
        }
        
        $this->em->persist($image);
        $this->em->flush();
    }
}