<?php

namespace Acme\DonanteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DonanteBundle\Entity\Donante;
use Acme\DonanteBundle\Form\DonanteType;

/**
 * Donante controller.
 *
 * @Route("/donante")
 */
class DonanteController extends Controller
{

    /**
     * Lists all Donante entities.
     *
     * @Route("/", name="donante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeDonanteBundle:Donante')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Donante entity.
     *
     * @Route("/", name="donante_create")
     * @Method("POST")
     * @Template("AcmeDonanteBundle:Donante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Donante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('donante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Donante entity.
     *
     * @param Donante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Donante $entity)
    {
        $form = $this->createForm(new DonanteType(), $entity, array(
            'action' => $this->generateUrl('donante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Donante entity.
     *
     * @Route("/new", name="donante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Donante();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Donante entity.
     *
     * @Route("/{id}", name="donante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDonanteBundle:Donante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Donante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Donante entity.
     *
     * @Route("/{id}/edit", name="donante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDonanteBundle:Donante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Donante entity.');
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
    * Creates a form to edit a Donante entity.
    *
    * @param Donante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Donante $entity)
    {
        $form = $this->createForm(new DonanteType(), $entity, array(
            'action' => $this->generateUrl('donante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Donante entity.
     *
     * @Route("/{id}", name="donante_update")
     * @Method("PUT")
     * @Template("AcmeDonanteBundle:Donante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDonanteBundle:Donante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Donante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('donante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Donante entity.
     *
     * @Route("/{id}", name="donante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeDonanteBundle:Donante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Donante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('donante'));
    }

    /**
     * Creates a form to delete a Donante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('donante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
