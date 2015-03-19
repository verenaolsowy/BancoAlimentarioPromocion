<?php

namespace Acme\AlimentoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeAlimentoBundle:Default:index.html.twig', array('name' => $name));
    }
}
