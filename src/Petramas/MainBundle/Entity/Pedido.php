<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\PedidoRepository")
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

    
    public function __construct()
    {
        $this->pedido_detalles = new ArrayCollection();
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
}
