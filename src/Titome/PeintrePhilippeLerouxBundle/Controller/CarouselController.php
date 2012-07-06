<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\AjoutType;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\CollecAjoutType;

class CarouselController extends Controller
{
    
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        
        $images = $repository->findAll();
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Default:index.html.twig', array('images' => $images));
    }
    
    public function ajoutAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        $images = $repository->findAll();
        //$image = $repository->find(1);
        
        $form = $this->createForm(new CollecAjoutType(), $images);
        //$form = $this->createForm(new AjoutType(), $image);
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Carousel:ajout.html.twig', array(
            'form'  => $form->createView(),
            
        ));
    }
    
    public function modifAction($id)
    {
        
    }
}