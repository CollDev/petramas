<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $securityContext = $this->container->get('security.context');
        
        if(!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirect($this->generateUrl('fos_user_security_login'));            
        } else if ($securityContext->isGranted('ROLE_CLIENTE')) {
            return $this->redirect($this->generateUrl('pedido_cliente'));
        }
        return array();
    }
}
