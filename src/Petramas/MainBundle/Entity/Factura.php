<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factura
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\FacturaRepository")
 */
class Factura
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
     * @ORM\OneToMany(targetEntity="Cliente", mappedBy="factura")
     */
    protected $clientes;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=50)
     */
    private $codigo;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="decimal")
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    public function __construct()
    {
        $this->clientes = new ArrayCollection();
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
     * Set codigo
     *
     * @param string $codigo
     * @return Factura
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Factura
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Factura
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
