<?php

namespace Acme\EntidadReceptoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\EntidadReceptoraBundle\Entity\EntidadReceptora;
use Acme\EntidadReceptoraBundle\Form\EntidadReceptoraType;

/**
 * EntidadReceptora controller.
 *
 * @Route("/entidadreceptora")
 */
class EntidadReceptoraController extends Controller
{

    /**
     * Lists all EntidadReceptora entities.
     *
     * @Route("/", name="entidadreceptora")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeEntidadReceptoraBundle:EntidadReceptora')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EntidadReceptora entity.
     *
     * @Route("/", name="entidadreceptora_create")
     * @Method("POST")
     * @Template("AcmeEntidadReceptoraBundle:EntidadReceptora:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EntidadReceptora();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('entidadreceptora_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EntidadReceptora entity.
     *
     * @param EntidadReceptora $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EntidadReceptora $entity)
    {
        $form = $this->createForm(new EntidadReceptoraType(), $entity, array(
            'action' => $this->generateUrl('entidadreceptora_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EntidadReceptora entity.
     *
     * @Route("/new", name="entidadreceptora_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EntidadReceptora();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EntidadReceptora entity.
     *
     * @Route("/{id}", name="entidadreceptora_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EntidadReceptora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntidadReceptora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EntidadReceptora entity.
     *
     * @Route("/{id}/edit", name="entidadreceptora_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EntidadReceptora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntidadReceptora entity.');
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
    * Creates a form to edit a EntidadReceptora entity.
    *
    * @param EntidadReceptora $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EntidadReceptora $entity)
    {
        $form = $this->createForm(new EntidadReceptoraType(), $entity, array(
            'action' => $this->generateUrl('entidadreceptora_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EntidadReceptora entity.
     *
     * @Route("/{id}", name="entidadreceptora_update")
     * @Method("PUT")
     * @Template("AcmeEntidadReceptoraBundle:EntidadReceptora:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EntidadReceptora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntidadReceptora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('entidadreceptora_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EntidadReceptora entity.
     *
     * @Route("/{id}", name="entidadreceptora_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EntidadReceptora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EntidadReceptora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('entidadreceptora'));
    }

    /**
     * Creates a form to delete a EntidadReceptora entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entidadreceptora_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
