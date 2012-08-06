<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Carousel;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Carousel\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\AjoutType;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\CollecAjoutType;

class CarouselController extends Controller
{
    
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Carousel');
        
        $images = $repository->findBy(array(), array('ordre' => 'ASC'));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Default:index.html.twig', array('images' => $images));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutAction()
    {
        $carousel = new Carousel;
        $form = $this->createForm(new AjoutType(), $carousel);
        
        $formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
            return $this->redirect($this->generateUrl('Accueil'));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Carousel:ajout.html.twig', array(
            'form'  => $form->createView(),
            
        ));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ordreAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Carousel');
        
        $images = $repository->findBy(array(), array('ordre' => 'ASC'));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Carousel:ordre.html.twig', array('images' => $images));
    }
}