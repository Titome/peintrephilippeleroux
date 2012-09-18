<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image\ModifHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Image\AjoutType;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Image\ModifType;


class ImageController extends Controller
{
    public function galerieAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        
        $images = $repository->findAll();
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:galerie.html.twig', array('images' => $images));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutAction()
    {
        $image = new Image;
        $form = $this->createForm(new AjoutType(), $image);
        
        $formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
            return $this->redirect($this->generateUrl('Galerie'));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:ajout.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function modifAction($id)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        $image = $repository->find($id);
        
        $form = $this->createForm(new ModifType(), $image);
        $formHandler = new ModifHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
        {
            $this->get('session')->setFlash('notice', 'Modifications effectuées !');
            return $this->redirect($this->generateUrl('Galerie'));
        }
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:modif.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $image = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Image')->find($id);
        
        unlink(__DIR__.'/../../../../web/image/'.$image->getNom());
        unlink(__DIR__.'/../../../../web/media/cache/my_thumb/image/'.$image->getNom());
        // Fichier généré que si on clique sur la miniature
        if (file_exists(__DIR__.'/../../../../web/media/cache/img/image/'.$image->getNom()))
        {
            unlink(__DIR__.'/../../../../web/media/cache/img/image/'.$image->getNom());
        }
        
        $em->remove($image);
        $em->flush();
        
        $this->get('session')->setFlash('notice', 'Suppression effectuée !');
        return $this->redirect($this->generateUrl('Galerie'));
    }
}