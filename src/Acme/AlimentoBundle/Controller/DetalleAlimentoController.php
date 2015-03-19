<?php

namespace Acme\AlimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\AlimentoBundle\Entity\DetalleAlimento;
use Acme\AlimentoBundle\Form\DetalleAlimentoType;

/**
 * DetalleAlimento controller.
 *
 * @Route("/detallealimento")
 */
class DetalleAlimentoController extends Controller
{

    /**
     * Lists all DetalleAlimento entities.
     *
     * @Route("/", name="detallealimento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeAlimentoBundle:DetalleAlimento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DetalleAlimento entity.
     *
     * @Route("/", name="detallealimento_create")
     * @Method("POST")
     * @Template("AcmeAlimentoBundle:DetalleAlimento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DetalleAlimento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('detallealimento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DetalleAlimento entity.
     *
     * @param DetalleAlimento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DetalleAlimento $entity)
    {
        $form = $this->createForm(new DetalleAlimentoType(), $entity, array(
            'action' => $this->generateUrl('detallealimento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DetalleAlimento entity.
     *
     * @Route("/new", name="detallealimento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DetalleAlimento();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DetalleAlimento entity.
     *
     * @Route("/{id}", name="detallealimento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAlimentoBundle:DetalleAlimento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleAlimento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DetalleAlimento entity.
     *
     * @Route("/{id}/edit", name="detallealimento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAlimentoBundle:DetalleAlimento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleAlimento entity.');
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
    * Creates a form to edit a DetalleAlimento entity.
    *
    * @param DetalleAlimento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DetalleAlimento $entity)
    {
        $form = $this->createForm(new DetalleAlimentoType(), $entity, array(
            'action' => $this->generateUrl('detallealimento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DetalleAlimento entity.
     *
     * @Route("/{id}", name="detallealimento_update")
     * @Method("PUT")
     * @Template("AcmeAlimentoBundle:DetalleAlimento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAlimentoBundle:DetalleAlimento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleAlimento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('detallealimento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DetalleAlimento entity.
     *
     * @Route("/{id}", name="detallealimento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeAlimentoBundle:DetalleAlimento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DetalleAlimento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('detallealimento'));
    }

    /**
     * Creates a form to delete a DetalleAlimento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallealimento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
