<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Carousel;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Carousel\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Carousel\ModifHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\AjoutType;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\ModifType;

class CarouselController extends Controller
{
    private $repository;
    
    // TODO :  faire le constructeur avec l'initialisation de $this->repository
    
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
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function modifAction($id)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Carousel');
        $image = $repository->find($id);
        
        $form = $this->createForm(new ModifType, $image);
        // TODO : Créer la validation
        $formHandler = new ModifHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager(), $id);
        
        if ($formHandler->process())
        {
            $this->get('session')->setFlash('notice', 'L\'ordre a été modifié avec succès !');
            return $this->redirect($this->generateUrl('OrdreCarousel'));
        }
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Carousel:modif.html.twig', array('form' => $form->createView()));
    }
    
    // TODO : Fusionner avec ordreAction(), template
    public function deleteViewAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Carousel');
        $images = $repository->findAll();
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Carousel:deleteView.html.twig', array('images' => $images));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $carousel = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Carousel')->find($id);
        
        unlink(__DIR__.'/../../../../web/image/'.$carousel->getImage());
        unlink(__DIR__.'/../../../../web/media/cache/my_thumb/image/'.$carousel->getImage());
        unlink(__DIR__.'/../../../../web/media/cache/img/image/'.$carousel->getImage());
        
        $em->remove($carousel);
        $em->flush();
        
        $this->get('session')->setFlash('notice', 'Suppression effectuée !');
        return $this->redirect($this->generateUrl('DeleteViewCarousel'));
    }
}