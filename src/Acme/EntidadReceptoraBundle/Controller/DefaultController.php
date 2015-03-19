<?php

namespace Acme\EntidadReceptoraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeEntidadReceptoraBundle:Default:index.html.twig', array('name' => $name));
    }
}
