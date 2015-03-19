<?php

namespace Acme\EntidadReceptoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\EntidadReceptoraBundle\Entity\EstadoEntidad;
use Acme\EntidadReceptoraBundle\Form\EstadoEntidadType;

/**
 * EstadoEntidad controller.
 *
 * @Route("/estadoentidad")
 */
class EstadoEntidadController extends Controller
{

    /**
     * Lists all EstadoEntidad entities.
     *
     * @Route("/", name="estadoentidad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeEntidadReceptoraBundle:EstadoEntidad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EstadoEntidad entity.
     *
     * @Route("/", name="estadoentidad_create")
     * @Method("POST")
     * @Template("AcmeEntidadReceptoraBundle:EstadoEntidad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EstadoEntidad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadoentidad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EstadoEntidad entity.
     *
     * @param EstadoEntidad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EstadoEntidad $entity)
    {
        $form = $this->createForm(new EstadoEntidadType(), $entity, array(
            'action' => $this->generateUrl('estadoentidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstadoEntidad entity.
     *
     * @Route("/new", name="estadoentidad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstadoEntidad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstadoEntidad entity.
     *
     * @Route("/{id}", name="estadoentidad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EstadoEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoEntidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstadoEntidad entity.
     *
     * @Route("/{id}/edit", name="estadoentidad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EstadoEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoEntidad entity.');
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
    * Creates a form to edit a EstadoEntidad entity.
    *
    * @param EstadoEntidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstadoEntidad $entity)
    {
        $form = $this->createForm(new EstadoEntidadType(), $entity, array(
            'action' => $this->generateUrl('estadoentidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstadoEntidad entity.
     *
     * @Route("/{id}", name="estadoentidad_update")
     * @Method("PUT")
     * @Template("AcmeEntidadReceptoraBundle:EstadoEntidad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EstadoEntidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoEntidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estadoentidad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EstadoEntidad entity.
     *
     * @Route("/{id}", name="estadoentidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeEntidadReceptoraBundle:EstadoEntidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstadoEntidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estadoentidad'));
    }

    /**
     * Creates a form to delete a EstadoEntidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadoentidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
