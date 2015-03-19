<?php

namespace Acme\PedidoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\PedidoBundle\Entity\AlimentoEntregaDirecta;
use Acme\PedidoBundle\Form\AlimentoEntregaDirectaType;

/**
 * AlimentoEntregaDirecta controller.
 *
 * @Route("/alimentoentregadirecta")
 */
class AlimentoEntregaDirectaController extends Controller
{

    /**
     * Lists all AlimentoEntregaDirecta entities.
     *
     * @Route("/", name="alimentoentregadirecta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmePedidoBundle:AlimentoEntregaDirecta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AlimentoEntregaDirecta entity.
     *
     * @Route("/", name="alimentoentregadirecta_create")
     * @Method("POST")
     * @Template("AcmePedidoBundle:AlimentoEntregaDirecta:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AlimentoEntregaDirecta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alimentoentregadirecta_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AlimentoEntregaDirecta entity.
     *
     * @param AlimentoEntregaDirecta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AlimentoEntregaDirecta $entity)
    {
        $form = $this->createForm(new AlimentoEntregaDirectaType(), $entity, array(
            'action' => $this->generateUrl('alimentoentregadirecta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AlimentoEntregaDirecta entity.
     *
     * @Route("/new", name="alimentoentregadirecta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AlimentoEntregaDirecta();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AlimentoEntregaDirecta entity.
     *
     * @Route("/{id}", name="alimentoentregadirecta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:AlimentoEntregaDirecta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlimentoEntregaDirecta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AlimentoEntregaDirecta entity.
     *
     * @Route("/{id}/edit", name="alimentoentregadirecta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:AlimentoEntregaDirecta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlimentoEntregaDirecta entity.');
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
    * Creates a form to edit a AlimentoEntregaDirecta entity.
    *
    * @param AlimentoEntregaDirecta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AlimentoEntregaDirecta $entity)
    {
        $form = $this->createForm(new AlimentoEntregaDirectaType(), $entity, array(
            'action' => $this->generateUrl('alimentoentregadirecta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AlimentoEntregaDirecta entity.
     *
     * @Route("/{id}", name="alimentoentregadirecta_update")
     * @Method("PUT")
     * @Template("AcmePedidoBundle:AlimentoEntregaDirecta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmePedidoBundle:AlimentoEntregaDirecta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlimentoEntregaDirecta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alimentoentregadirecta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AlimentoEntregaDirecta entity.
     *
     * @Route("/{id}", name="alimentoentregadirecta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmePedidoBundle:AlimentoEntregaDirecta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AlimentoEntregaDirecta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alimentoentregadirecta'));
    }

    /**
     * Creates a form to delete a AlimentoEntregaDirecta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alimentoentregadirecta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
