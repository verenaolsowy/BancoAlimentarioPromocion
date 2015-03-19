<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PedidoBundle\Entity\AlimentoPedido;
use Acme\PedidoBundle\Form\AlimentoPedidoType;

/**
 * AlimentoPedido controller.
 *
 * @Route("/alimentopedido")
 */
class AlimentoPedidoController extends Controller
{

    /**
     * Lists all AlimentoPedido entities.
     *
     * @Route("/", name="alimentopedido")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePedidoBundle:AlimentoPedido')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AlimentoPedido entity.
     *
     * @Route("/", name="alimentopedido_create")
     * @Method("POST")
     * @Template("AcmePedidoBundle:AlimentoPedido:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AlimentoPedido();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alimentopedido_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AlimentoPedido entity.
     *
     * @param AlimentoPedido $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AlimentoPedido $entity)
    {
        $form = $this->createForm(new AlimentoPedidoType(), $entity, array(
            'action' => $this->generateUrl('alimentopedido_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AlimentoPedido entity.
     *
     * @Route("/new", name="alimentopedido_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AlimentoPedido();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AlimentoPedido entity.
     *
     * @Route("/{id}", name="alimentopedido_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:AlimentoPedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlimentoPedido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AlimentoPedido entity.
     *
     * @Route("/{id}/edit", name="alimentopedido_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:AlimentoPedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlimentoPedido entity.');
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
    * Creates a form to edit a AlimentoPedido entity.
    *
    * @param AlimentoPedido $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AlimentoPedido $entity)
    {
        $form = $this->createForm(new AlimentoPedidoType(), $entity, array(
            'action' => $this->generateUrl('alimentopedido_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AlimentoPedido entity.
     *
     * @Route("/{id}", name="alimentopedido_update")
     * @Method("PUT")
     * @Template("AcmePedidoBundle:AlimentoPedido:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:AlimentoPedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlimentoPedido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alimentopedido_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AlimentoPedido entity.
     *
     * @Route("/{id}", name="alimentopedido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePedidoBundle:AlimentoPedido')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AlimentoPedido entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alimentopedido'));
    }

    /**
     * Creates a form to delete a AlimentoPedido entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alimentopedido_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
