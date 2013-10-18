<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\TipoIndicador;
use Petramas\MainBundle\Form\TipoIndicadorType;

/**
 * TipoIndicador controller.
 *
 * @Route("/tipoindicador")
 */
class TipoIndicadorController extends Controller
{

    /**
     * Lists all TipoIndicador entities.
     *
     * @Route("/", name="tipoindicador")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:TipoIndicador')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoIndicador entity.
     *
     * @Route("/", name="tipoindicador_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:TipoIndicador:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoIndicador();
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
                    'message' => 'Tipo de indicador creado con éxito.'
                )
            );
            
            return $this->redirect($this->generateUrl('tipoindicador_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TipoIndicador entity.
    *
    * @param TipoIndicador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TipoIndicador $entity)
    {
        $form = $this->createForm(new TipoIndicadorType(), $entity, array(
            'action' => $this->generateUrl('tipoindicador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new TipoIndicador entity.
     *
     * @Route("/new", name="tipoindicador_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoIndicador();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoIndicador entity.
     *
     * @Route("/{id}", name="tipoindicador_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:TipoIndicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoIndicador entity.
     *
     * @Route("/{id}/edit", name="tipoindicador_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:TipoIndicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
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
    * Creates a form to edit a TipoIndicador entity.
    *
    * @param TipoIndicador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoIndicador $entity)
    {
        $form = $this->createForm(new TipoIndicadorType(), $entity, array(
            'action' => $this->generateUrl('tipoindicador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing TipoIndicador entity.
     *
     * @Route("/{id}", name="tipoindicador_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:TipoIndicador:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:TipoIndicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
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
                    'message' => 'Indicador actualizado satisfactoriamente.'
                )
            );
            
            return $this->redirect($this->generateUrl('tipoindicador', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoIndicador entity.
     *
     * @Route("/{id}", name="tipoindicador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:TipoIndicador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoIndicador entity.');
            }

            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminado!',
                    'message' => 'Indicador removido.'
                )
            );
        }

        return $this->redirect($this->generateUrl('tipoindicador'));
    }

    /**
     * Creates a form to delete a TipoIndicador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoindicador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
