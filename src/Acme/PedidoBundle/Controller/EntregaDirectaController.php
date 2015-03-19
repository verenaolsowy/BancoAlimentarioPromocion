<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PedidoBundle\Entity\EntregaDirecta;
use Acme\PedidoBundle\Form\EntregaDirectaType;

/**
 * EntregaDirecta controller.
 *
 * @Route("/entregadirecta")
 */
class EntregaDirectaController extends Controller
{

    /**
     * Lists all EntregaDirecta entities.
     *
     * @Route("/", name="entregadirecta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePedidoBundle:EntregaDirecta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EntregaDirecta entity.
     *
     * @Route("/", name="entregadirecta_create")
     * @Method("POST")
     * @Template("AcmePedidoBundle:EntregaDirecta:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EntregaDirecta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('entregadirecta_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EntregaDirecta entity.
     *
     * @param EntregaDirecta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EntregaDirecta $entity)
    {
        $form = $this->createForm(new EntregaDirectaType(), $entity, array(
            'action' => $this->generateUrl('entregadirecta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EntregaDirecta entity.
     *
     * @Route("/new", name="entregadirecta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EntregaDirecta();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EntregaDirecta entity.
     *
     * @Route("/{id}", name="entregadirecta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:EntregaDirecta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntregaDirecta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EntregaDirecta entity.
     *
     * @Route("/{id}/edit", name="entregadirecta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:EntregaDirecta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntregaDirecta entity.');
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
    * Creates a form to edit a EntregaDirecta entity.
    *
    * @param EntregaDirecta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EntregaDirecta $entity)
    {
        $form = $this->createForm(new EntregaDirectaType(), $entity, array(
            'action' => $this->generateUrl('entregadirecta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EntregaDirecta entity.
     *
     * @Route("/{id}", name="entregadirecta_update")
     * @Method("PUT")
     * @Template("AcmePedidoBundle:EntregaDirecta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:EntregaDirecta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntregaDirecta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('entregadirecta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EntregaDirecta entity.
     *
     * @Route("/{id}", name="entregadirecta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePedidoBundle:EntregaDirecta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EntregaDirecta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('entregadirecta'));
    }

    /**
     * Creates a form to delete a EntregaDirecta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entregadirecta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
