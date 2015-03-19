<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PedidoBundle\Entity\EstadoPedido;
use Acme\PedidoBundle\Form\EstadoPedidoType;

/**
 * EstadoPedido controller.
 *
 * @Route("/estadopedido")
 */
class EstadoPedidoController extends Controller
{

    /**
     * Lists all EstadoPedido entities.
     *
     * @Route("/", name="estadopedido")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePedidoBundle:EstadoPedido')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EstadoPedido entity.
     *
     * @Route("/", name="estadopedido_create")
     * @Method("POST")
     * @Template("AcmePedidoBundle:EstadoPedido:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EstadoPedido();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadopedido_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EstadoPedido entity.
     *
     * @param EstadoPedido $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EstadoPedido $entity)
    {
        $form = $this->createForm(new EstadoPedidoType(), $entity, array(
            'action' => $this->generateUrl('estadopedido_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstadoPedido entity.
     *
     * @Route("/new", name="estadopedido_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstadoPedido();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstadoPedido entity.
     *
     * @Route("/{id}", name="estadopedido_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:EstadoPedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoPedido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstadoPedido entity.
     *
     * @Route("/{id}/edit", name="estadopedido_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:EstadoPedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoPedido entity.');
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
    * Creates a form to edit a EstadoPedido entity.
    *
    * @param EstadoPedido $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstadoPedido $entity)
    {
        $form = $this->createForm(new EstadoPedidoType(), $entity, array(
            'action' => $this->generateUrl('estadopedido_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstadoPedido entity.
     *
     * @Route("/{id}", name="estadopedido_update")
     * @Method("PUT")
     * @Template("AcmePedidoBundle:EstadoPedido:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:EstadoPedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoPedido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estadopedido_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EstadoPedido entity.
     *
     * @Route("/{id}", name="estadopedido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePedidoBundle:EstadoPedido')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstadoPedido entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estadopedido'));
    }

    /**
     * Creates a form to delete a EstadoPedido entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadopedido_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
