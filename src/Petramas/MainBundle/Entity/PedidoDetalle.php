<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PedidoDetalle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\PedidoDetalleRepository")
 */
class PedidoDetalle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Pedido", inversedBy="pedido_detalles")
     * @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     */
    protected $pedido;
    
    /**
     * @ORM\ManyToOne(targetEntity="Material", inversedBy="pedido_detalles")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $material;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=2)
     */
    private $importe;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return PedidoDetalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set importe
     *
     * @param float $importe
     * @return PedidoDetalle
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    
        return $this;
    }

    /**
     * Get importe
     *
     * @return float 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set pedido
     *
     * @param \Petramas\MainBundle\Entity\Pedido $pedido
     * @return PedidoDetalle
     */
    public function setPedido(\Petramas\MainBundle\Entity\Pedido $pedido = null)
    {
        $this->pedido = $pedido;
    
        return $this;
    }

    /**
     * Get pedido
     *
     * @return \Petramas\MainBundle\Entity\Pedido 
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set material
     *
     * @param \Petramas\MainBundle\Entity\Material $material
     * @return PedidoDetalle
     */
    public function setMaterial(\Petramas\MainBundle\Entity\Material $material = null)
    {
        $this->material = $material;
    
        return $this;
    }

    /**
     * Get material
     *
     * @return \Petramas\MainBundle\Entity\Material 
     */
    public function getMaterial()
    {
        return $this->material;
    }
}