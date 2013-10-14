<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Tarifa;
use Petramas\MainBundle\Form\TarifaType;

/**
 * Tarifa controller.
 *
 * @Route("/tarifa")
 */
class TarifaController extends Controller
{

    /**
     * Lists all Tarifa entities.
     *
     * @Route("/", name="tarifa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Tarifa')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tarifa entity.
     *
     * @Route("/", name="tarifa_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Tarifa:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tarifa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tarifa_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Tarifa entity.
    *
    * @param Tarifa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tarifa $entity)
    {
        $form = $this->createForm(new TarifaType(), $entity, array(
            'action' => $this->generateUrl('tarifa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Tarifa entity.
     *
     * @Route("/new", name="tarifa_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tarifa();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tarifa entity.
     *
     * @Route("/{id}", name="tarifa_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Tarifa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarifa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tarifa entity.
     *
     * @Route("/{id}/edit", name="tarifa_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Tarifa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarifa entity.');
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
    * Creates a form to edit a Tarifa entity.
    *
    * @param Tarifa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tarifa $entity)
    {
        $form = $this->createForm(new TarifaType(), $entity, array(
            'action' => $this->generateUrl('tarifa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tarifa entity.
     *
     * @Route("/{id}", name="tarifa_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Tarifa:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Tarifa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarifa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tarifa_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tarifa entity.
     *
     * @Route("/{id}", name="tarifa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Tarifa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tarifa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tarifa'));
    }

    /**
     * Creates a form to delete a Tarifa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarifa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
