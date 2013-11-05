<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Pedido;
use Petramas\MainBundle\Form\PedidoType;

/**
 * Pedido controller.
 *
 * @Route("/pedido")
 */
class PedidoController extends Controller
{

    /**
     * Lists all Pedido entities.
     *
     * @Route("/", name="pedido")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Pedido')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Lista los Pedidos pendientes del cliente.
     *
     * @Route("/cliente", name="pedido_cliente")
     * @Method("GET")
     * @Template("PetramasMainBundle:Pedido:cliente.html.twig")
     */
    public function clienteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();
                
        $objEstado = $em->getRepository('PetramasMainBundle:Estado')->findOneBy(array('nombre' => 'pendiente'));
        $entities = $em->getRepository('PetramasMainBundle:Pedido')->findPedidosDeUsuarioPorEstado($user->getId(), $objEstado->getId());

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Lista los Pedidos confirmados.
     *
     * @Route("/salida", name="pedido_salida")
     * @Method("GET")
     * @Template("PetramasMainBundle:Pedido:salida.html.twig")
     */
    public function salidaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objEstado = $em->getRepository('PetramasMainBundle:Estado')->findOneBy(array('nombre' => 'confirmado'));
        $entities = $em->getRepository('PetramasMainBundle:Pedido')->findBy(array('estado' => $objEstado));

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Creates a new Pedido entity.
     *
     * @Route("/", name="pedido_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Pedido:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pedido();
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
                    'message' => 'Pedido creado con éxito.'
                )
            );

            return $this->redirect($this->generateUrl('pedido_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Pedido entity.
    *
    * @param Pedido $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pedido $entity)
    {
        $form = $this->createForm(new PedidoType(), $entity, array(
            'action' => $this->generateUrl('pedido_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Pedido entity.
     *
     * @Route("/new", name="pedido_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Pedido();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Pedido entity.
     *
     * @Route("/{id}", name="pedido_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Pedido')->find($id);
        $objPedidoDetalle = $em->getRepository('PetramasMainBundle:PedidoDetalle')->findBy(array('pedido' => $entity->getId()));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'pedido_detalle' => $objPedidoDetalle,
        );
    }

    /**
     * Displays a form to edit an existing Pedido entity.
     *
     * @Route("/{id}/edit", name="pedido_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Pedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedido entity.');
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
    * Creates a form to edit a Pedido entity.
    *
    * @param Pedido $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pedido $entity)
    {
        $form = $this->createForm(new PedidoType(), $entity, array(
            'action' => $this->generateUrl('pedido_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Pedido entity.
     *
     * @Route("/{id}", name="pedido_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Pedido:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Pedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedido entity.');
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
                    'message' => 'Pedido actualizado satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('pedido', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pedido entity.
     *
     * @Route("/{id}", name="pedido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Pedido')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pedido entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminado!',
                    'message' => 'Pedido removido.'
                )
            );
        }

        return $this->redirect($this->generateUrl('pedido'));
    }

    /**
     * Creates a form to delete a Pedido entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedido_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
    
    /**
     * Confirma un Pedido.
     *
     * @Route("/confirmar/{id}", name="pedido_confirmar")
     * @Method("GET")
     */
    public function confirmarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Pedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedido entity.');
        }
        
        $objEstado = $em->getRepository('PetramasMainBundle:Estado')->findOneBy(array('nombre' => 'confirmado'));
        $entity->setEstado($objEstado);
        
        $em->persist($entity);
        $em->flush();

        $this->get('session')->getFlashBag()->set(
            'success',
            array(
                'title' => 'Aceptado!',
                'message' => 'Pedido confirmado satisfactoriamente.'
            )
        );

        return $this->redirect($this->generateUrl('pedido_cliente'));
    }
    
    /**
     * Registra la salida de un Pedido.
     *
     * @Route("/registrar/{id}", name="pedido_registrar")
     * @Method("GET")
     */
    public function registrarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Pedido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pedido entity.');
        }
        
        $objEstado = $em->getRepository('PetramasMainBundle:Estado')->findOneBy(array('nombre' => 'atendido'));
        $entity->setEstado($objEstado);
        
        $em->persist($entity);
        $em->flush();

        $this->get('session')->getFlashBag()->set(
            'success',
            array(
                'title' => 'Registrado!',
                'message' => 'Registrada la salida del pedido satisfactoriamente.'
            )
        );

        return $this->redirect($this->generateUrl('pedido_salida'));
    }
}
