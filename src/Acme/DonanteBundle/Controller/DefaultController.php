<?php

namespace Acme\DonanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeDonanteBundle:Default:index.html.twig', array('name' => $name));
    }
}
