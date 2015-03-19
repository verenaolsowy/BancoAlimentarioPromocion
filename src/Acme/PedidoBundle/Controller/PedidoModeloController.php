<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PedidoBundle\Entity\PedidoModelo;
use Acme\PedidoBundle\Form\PedidoModeloType;

/**
 * PedidoModelo controller.
 *
 * @Route("/pedidomodelo")
 */
class PedidoModeloController extends Controller
{

    /**
     * Lists all PedidoModelo entities.
     *
     * @Route("/", name="pedidomodelo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePedidoBundle:PedidoModelo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PedidoModelo entity.
     *
     * @Route("/", name="pedidomodelo_create")
     * @Method("POST")
     * @Template("AcmePedidoBundle:PedidoModelo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PedidoModelo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidomodelo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a PedidoModelo entity.
     *
     * @param PedidoModelo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PedidoModelo $entity)
    {
        $form = $this->createForm(new PedidoModeloType(), $entity, array(
            'action' => $this->generateUrl('pedidomodelo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PedidoModelo entity.
     *
     * @Route("/new", name="pedidomodelo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PedidoModelo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PedidoModelo entity.
     *
     * @Route("/{id}", name="pedidomodelo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:PedidoModelo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PedidoModelo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PedidoModelo entity.
     *
     * @Route("/{id}/edit", name="pedidomodelo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:PedidoModelo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PedidoModelo entity.');
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
    * Creates a form to edit a PedidoModelo entity.
    *
    * @param PedidoModelo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PedidoModelo $entity)
    {
        $form = $this->createForm(new PedidoModeloType(), $entity, array(
            'action' => $this->generateUrl('pedidomodelo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PedidoModelo entity.
     *
     * @Route("/{id}", name="pedidomodelo_update")
     * @Method("PUT")
     * @Template("AcmePedidoBundle:PedidoModelo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:PedidoModelo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PedidoModelo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pedidomodelo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PedidoModelo entity.
     *
     * @Route("/{id}", name="pedidomodelo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePedidoBundle:PedidoModelo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PedidoModelo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pedidomodelo'));
    }

    /**
     * Creates a form to delete a PedidoModelo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedidomodelo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
