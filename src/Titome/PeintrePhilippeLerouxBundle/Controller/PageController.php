<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Livre;
use Titome\PeintrePhilippeLerouxBundle\Entity\Page;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Page\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Page\AjoutType;

class PageController extends Controller
{
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $repositoryLivre = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Livre');
        $livre = $repositoryLivre->find($id);

	$repositoryPage = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Page');
	$pages = $repositoryPage->findBy(array('livre' => $livre));

	return $this->render('TitomePeintrePhilippeLerouxBundle:Page:index.html.twig', array('pages' => $pages));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutAction($livreId)
    {
        $page = new Page($this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Livre')->find($livreId));

	$form = $this->createForm(new AjoutType(), $page);

	$formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());

	if ($formHandler->process())
	{
            $this->get('session')->setFlash('notice', 
                    'Page ajoutée ! Pour arrêter de rajouter des pages au livre cliquer <a href="#">ici</a>');
            
            return $this->redirect($this->generateUrl('AjoutPage', array('livreId' => $livreId)));
	}

            return $this->render('TitomePeintrePhilippeLerouxBundle:Page:ajout.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteViewAction($livreId)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $repositoryLivre = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Livre');
        $livre = $repositoryLivre->find($livreId);

	$repositoryPage = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Page');
	$pages = $repositoryPage->findBy(array('livre' => $livre));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Page:deleteView.html.twig', array(
            'pages' => $pages,
            'livre' => $livre
        ));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($livreId, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $livre = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Livre')->find($livreId);
        $page = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Page')->findOneBy(array('livre' => $livre, 'id' => $id));
            
        unlink(__DIR__.'/../../../../web/image/'.$page->getNom());
                
        if (file_exists(__DIR__.'/../../../../web/media/cache/img/image/'.$page->getNom()))
            unlink(__DIR__.'/../../../../web/media/cache/img/image/'.$page->getNom());
                
        $em->remove($page);
        $em->flush();
            
        $this->get('session')->setFlash('notice', 'Suppression effectuée !');
            
        return $this->redirect($this->generateUrl('DeleteViewPage', array('livreId' => $livreId)));
    }
}