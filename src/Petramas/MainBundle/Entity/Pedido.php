<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pedido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\PedidoRepository")
 */
class Pedido
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
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="pedidos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    protected $cliente;
    
    /**
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="pedidos")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */
    protected $estado;
    
    /**
     * @ORM\ManyToOne(targetEntity="Factura", inversedBy="pedidos")
     * @ORM\JoinColumn(name="factura_id", referencedColumnName="id")
     */
    protected $factura;
    
    /**
     * @ORM\OneToMany(targetEntity="PedidoDetalle", mappedBy="pedido")
     */
    protected $pedido_detalles;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_programacion", type="datetime")
     */
    private $fechaProgramacion;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pedido_detalles = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getCliente()->getRazonSocial() .
            ' ' . $this->getFechaProgramacion()->format("Y-m-d H:i:s") .
            ' ' . $this->getFactura()->getTotal();
    }
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
     * Set fechaProgramacion
     *
     * @param \DateTime $fechaProgramacion
     * @return Pedido
     */
    public function setFechaProgramacion($fechaProgramacion)
    {
        $this->fechaProgramacion = $fechaProgramacion;
    
        return $this;
    }

    /**
     * Get fechaProgramacion
     *
     * @return \DateTime 
     */
    public function getFechaProgramacion()
    {
        return $this->fechaProgramacion;
    }

    /**
     * Set cliente
     *
     * @param \Petramas\MainBundle\Entity\Cliente $cliente
     * @return Pedido
     */
    public function setCliente(\Petramas\MainBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Petramas\MainBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set estado
     *
     * @param \Petramas\MainBundle\Entity\Estado $estado
     * @return Pedido
     */
    public function setEstado(\Petramas\MainBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Petramas\MainBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set factura
     *
     * @param \Petramas\MainBundle\Entity\Factura $factura
     * @return Pedido
     */
    public function setFactura(\Petramas\MainBundle\Entity\Factura $factura = null)
    {
        $this->factura = $factura;
    
        return $this;
    }

    /**
     * Get factura
     *
     * @return \Petramas\MainBundle\Entity\Factura 
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Add pedido_detalles
     *
     * @param \Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles
     * @return Pedido
     */
    public function addPedidoDetalles(\Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles)
    {
        $this->pedido_detalles[] = $pedidoDetalles;
    
        return $this;
    }

    /**
     * Remove pedido_detalles
     *
     * @param \Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles
     */
    public function removePedidoDetalles(\Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles)
    {
        $this->pedido_detalles->removeElement($pedidoDetalles);
    }

    /**
     * Get pedido_detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidoDetalles()
    {
        return $this->pedido_detalles;
    }
}