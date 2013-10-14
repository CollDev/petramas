<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\BoletaMaterial;
use Petramas\MainBundle\Form\BoletaMaterialType;

/**
 * BoletaMaterial controller.
 *
 * @Route("/boletamaterial")
 */
class BoletaMaterialController extends Controller
{

    /**
     * Lists all BoletaMaterial entities.
     *
     * @Route("/", name="boletamaterial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:BoletaMaterial')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BoletaMaterial entity.
     *
     * @Route("/", name="boletamaterial_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:BoletaMaterial:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BoletaMaterial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('boletamaterial_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BoletaMaterial entity.
    *
    * @param BoletaMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BoletaMaterial $entity)
    {
        $form = $this->createForm(new BoletaMaterialType(), $entity, array(
            'action' => $this->generateUrl('boletamaterial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new BoletaMaterial entity.
     *
     * @Route("/new", name="boletamaterial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BoletaMaterial();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BoletaMaterial entity.
     *
     * @Route("/{id}", name="boletamaterial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:BoletaMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoletaMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BoletaMaterial entity.
     *
     * @Route("/{id}/edit", name="boletamaterial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:BoletaMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoletaMaterial entity.');
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
    * Creates a form to edit a BoletaMaterial entity.
    *
    * @param BoletaMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BoletaMaterial $entity)
    {
        $form = $this->createForm(new BoletaMaterialType(), $entity, array(
            'action' => $this->generateUrl('boletamaterial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BoletaMaterial entity.
     *
     * @Route("/{id}", name="boletamaterial_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:BoletaMaterial:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:BoletaMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoletaMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('boletamaterial', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BoletaMaterial entity.
     *
     * @Route("/{id}", name="boletamaterial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:BoletaMaterial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BoletaMaterial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('boletamaterial'));
    }

    /**
     * Creates a form to delete a BoletaMaterial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boletamaterial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
