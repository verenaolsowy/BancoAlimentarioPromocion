<?php

namespace Acme\ConfiguracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeConfiguracionBundle:Default:index.html.twig', array('name' => $name));
    }
}
