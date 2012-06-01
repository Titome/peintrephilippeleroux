<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CarouselController extends Controller
{
    
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        
        $images = $repository->findAll();
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Default:index.html.twig', array('images' => $images));
    }
}