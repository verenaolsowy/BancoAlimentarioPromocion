<?php

namespace Acme\AlimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\AlimentoBundle\Entity\Alimento;
use Acme\AlimentoBundle\Form\AlimentoType;

/**
 * Alimento controller.
 *
 * @Route("/alimento")
 */
class AlimentoController extends Controller
{

    /**
     * Lists all Alimento entities.
     *
     * @Route("/", name="alimento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeAlimentoBundle:Alimento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Alimento entity.
     *
     * @Route("/", name="alimento_create")
     * @Method("POST")
     * @Template("AcmeAlimentoBundle:Alimento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Alimento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alimento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Alimento entity.
     *
     * @param Alimento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Alimento $entity)
    {
        $form = $this->createForm(new AlimentoType(), $entity, array(
            'action' => $this->generateUrl('alimento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Alimento entity.
     *
     * @Route("/new", name="alimento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Alimento();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Alimento entity.
     *
     * @Route("/{id}", name="alimento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAlimentoBundle:Alimento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alimento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Alimento entity.
     *
     * @Route("/{id}/edit", name="alimento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAlimentoBundle:Alimento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alimento entity.');
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
    * Creates a form to edit a Alimento entity.
    *
    * @param Alimento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Alimento $entity)
    {
        $form = $this->createForm(new AlimentoType(), $entity, array(
            'action' => $this->generateUrl('alimento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Alimento entity.
     *
     * @Route("/{id}", name="alimento_update")
     * @Method("PUT")
     * @Template("AcmeAlimentoBundle:Alimento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeAlimentoBundle:Alimento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alimento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alimento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Alimento entity.
     *
     * @Route("/{id}", name="alimento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeAlimentoBundle:Alimento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Alimento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alimento'));
    }

    /**
     * Creates a form to delete a Alimento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alimento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
