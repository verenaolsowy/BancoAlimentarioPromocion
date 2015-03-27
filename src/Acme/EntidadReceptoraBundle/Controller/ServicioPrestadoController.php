<?php

namespace Acme\EntidadReceptoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\EntidadReceptoraBundle\Entity\ServicioPrestado;
use Acme\EntidadReceptoraBundle\Form\ServicioPrestadoType;

/**
 * ServicioPrestado controller.
 *
 * @Route("/servicioprestado")
 */
class ServicioPrestadoController extends Controller
{

    /**
     * Lists all ServicioPrestado entities.
     * @Security("has_role('ROLE_CONSULTA')")
     * @Route("/", name="servicioprestado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeEntidadReceptoraBundle:ServicioPrestado')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ServicioPrestado entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/", name="servicioprestado_create")
     * @Method("POST")
     * @Template("AcmeEntidadReceptoraBundle:ServicioPrestado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ServicioPrestado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('servicioprestado_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ServicioPrestado entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @param ServicioPrestado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ServicioPrestado $entity)
    {
        $form = $this->createForm(new ServicioPrestadoType(), $entity, array(
            'action' => $this->generateUrl('servicioprestado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ServicioPrestado entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/new", name="servicioprestado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ServicioPrestado();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ServicioPrestado entity.
     * @Security("has_role('ROLE_CONSULTA')")
     * @Route("/{id}", name="servicioprestado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:ServicioPrestado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServicioPrestado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ServicioPrestado entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/{id}/edit", name="servicioprestado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:ServicioPrestado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServicioPrestado entity.');
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
    * Creates a form to edit a ServicioPrestado entity.
    * @Security("has_role('ROLE_ADMIN')")
    * @param ServicioPrestado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ServicioPrestado $entity)
    {
        $form = $this->createForm(new ServicioPrestadoType(), $entity, array(
            'action' => $this->generateUrl('servicioprestado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ServicioPrestado entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/{id}", name="servicioprestado_update")
     * @Method("PUT")
     * @Template("AcmeEntidadReceptoraBundle:ServicioPrestado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeEntidadReceptoraBundle:ServicioPrestado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServicioPrestado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('servicioprestado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ServicioPrestado entity.
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/{id}", name="servicioprestado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeEntidadReceptoraBundle:ServicioPrestado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ServicioPrestado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('servicioprestado'));
    }

    /**
     * Creates a form to delete a ServicioPrestado entity by id.
     * @Security("has_role('ROLE_ADMIN')")
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servicioprestado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
