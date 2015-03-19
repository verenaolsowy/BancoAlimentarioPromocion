<?php

namespace Acme\EntidadReceptoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\EntidadReceptoraBundle\Entity\NecesidadEntidad;
use Acme\EntidadReceptoraBundle\Form\NecesidadEntidadType;

/**
 * NecesidadEntidad controller.
 *
 * @Route("/necesidadentidad")
 */
class NecesidadEntidadController extends Controller
{

    /**
     * Lists all NecesidadEntidad entities.
     *
     * @Route("/", name="necesidadentidad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeEntidadReceptoraBundle:NecesidadEntidad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new NecesidadEntidad entity.
     *
     * @Route("/", name="necesidadentidad_create")
     * @Method("POST")
     * @Template("AcmeEntidadReceptoraBundle:NecesidadEntidad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new NecesidadEntidad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('necesidadentidad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a NecesidadEntidad entity.
     *
     * @param NecesidadEntidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NecesidadEntidad $entity)
    {
        $form = $this->createForm(new NecesidadEntidadType(), $entity, array(
            'action' => $this->generateUrl('necesidadentidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NecesidadEntidad entity.
     *
     * @Route("/new", name="necesidadentidad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new NecesidadEntidad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a NecesidadEntidad entity.
     *
     * @Route("/{id}", name="necesidadentidad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:NecesidadEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NecesidadEntidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing NecesidadEntidad entity.
     *
     * @Route("/{id}/edit", name="necesidadentidad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:NecesidadEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NecesidadEntidad entity.');
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
    * Creates a form to edit a NecesidadEntidad entity.
    *
    * @param NecesidadEntidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NecesidadEntidad $entity)
    {
        $form = $this->createForm(new NecesidadEntidadType(), $entity, array(
            'action' => $this->generateUrl('necesidadentidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NecesidadEntidad entity.
     *
     * @Route("/{id}", name="necesidadentidad_update")
     * @Method("PUT")
     * @Template("AcmeEntidadReceptoraBundle:NecesidadEntidad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:NecesidadEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NecesidadEntidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('necesidadentidad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a NecesidadEntidad entity.
     *
     * @Route("/{id}", name="necesidadentidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeEntidadReceptoraBundle:NecesidadEntidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NecesidadEntidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('necesidadentidad'));
    }

    /**
     * Creates a form to delete a NecesidadEntidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('necesidadentidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
