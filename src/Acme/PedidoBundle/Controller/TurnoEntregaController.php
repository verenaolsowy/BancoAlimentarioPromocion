<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PedidoBundle\Entity\TurnoEntrega;
use Acme\PedidoBundle\Form\TurnoEntregaType;

/**
 * TurnoEntrega controller.
 *
 * @Route("/turnoentrega")
 */
class TurnoEntregaController extends Controller
{

    /**
     * Lists all TurnoEntrega entities.
     *
     * @Route("/", name="turnoentrega")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePedidoBundle:TurnoEntrega')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TurnoEntrega entity.
     *
     * @Route("/", name="turnoentrega_create")
     * @Method("POST")
     * @Template("AcmePedidoBundle:TurnoEntrega:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TurnoEntrega();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('turnoentrega_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TurnoEntrega entity.
     *
     * @param TurnoEntrega $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TurnoEntrega $entity)
    {
        $form = $this->createForm(new TurnoEntregaType(), $entity, array(
            'action' => $this->generateUrl('turnoentrega_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TurnoEntrega entity.
     *
     * @Route("/new", name="turnoentrega_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TurnoEntrega();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TurnoEntrega entity.
     *
     * @Route("/{id}", name="turnoentrega_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:TurnoEntrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TurnoEntrega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TurnoEntrega entity.
     *
     * @Route("/{id}/edit", name="turnoentrega_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:TurnoEntrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TurnoEntrega entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TurnoEntrega entity.
    *
    * @param TurnoEntrega $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TurnoEntrega $entity)
    {
        $form = $this->createForm(new TurnoEntregaType(), $entity, array(
            'action' => $this->generateUrl('turnoentrega_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TurnoEntrega entity.
     *
     * @Route("/{id}", name="turnoentrega_update")
     * @Method("PUT")
     * @Template("AcmePedidoBundle:TurnoEntrega:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:TurnoEntrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TurnoEntrega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('turnoentrega_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TurnoEntrega entity.
     *
     * @Route("/{id}", name="turnoentrega_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePedidoBundle:TurnoEntrega')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TurnoEntrega entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('turnoentrega'));
    }

    /**
     * Creates a form to delete a TurnoEntrega entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('turnoentrega_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
