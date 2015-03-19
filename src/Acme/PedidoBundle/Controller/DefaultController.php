<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmePedidoBundle:Default:index.html.twig', array('name' => $name));
    }
}
