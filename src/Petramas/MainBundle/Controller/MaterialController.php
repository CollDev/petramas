<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Material;
use Petramas\MainBundle\Form\MaterialType;

/**
 * Material controller.
 *
 * @Route("/material")
 */
class MaterialController extends Controller
{

    /**
     * Lists all Material entities.
     *
     * @Route("/", name="material")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Material')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Material entity.
     *
     * @Route("/", name="material_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Material:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Material();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Nuevo!',
                    'message' => 'Material creado con éxito.'
                )
            );

            return $this->redirect($this->generateUrl('material_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Material entity.
    *
    * @param Material $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Material $entity)
    {
        $form = $this->createForm(new MaterialType(), $entity, array(
            'action' => $this->generateUrl('material_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Material entity.
     *
     * @Route("/new", name="material_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Material();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Material entity.
     *
     * @Route("/{id}", name="material_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Material')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Material entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Material entity.
     *
     * @Route("/{id}/edit", name="material_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Material')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Material entity.');
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
    * Creates a form to edit a Material entity.
    *
    * @param Material $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Material $entity)
    {
        $form = $this->createForm(new MaterialType(), $entity, array(
            'action' => $this->generateUrl('material_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Material entity.
     *
     * @Route("/{id}", name="material_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Material:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Material')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Material entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Editado!',
                    'message' => 'Material actualizado satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('material', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Material entity.
     *
     * @Route("/{id}", name="material_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Material')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Material entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminado!',
                    'message' => 'Material removido.'
                )
            );
        }

        return $this->redirect($this->generateUrl('material'));
    }

    /**
     * Creates a form to delete a Material entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('material_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
