<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LiquidacionMaterial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\LiquidacionMaterialRepository")
 */
class LiquidacionMaterial
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
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="liquidacion_material")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    protected $cliente;
    
    /**
     * @ORM\OneToMany(targetEntity="LiquidacionMaterialDetalle", mappedBy="liquidacion_material")
     */
    protected $liquidacion_material_detalles;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_liquidacion", type="datetime")
     */
    private $fechaLiquidacion;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=2)
     */
    private $importe;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liquidacion_material_detalles = new ArrayCollection();
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
     * Set fechaLiquidacion
     *
     * @param \DateTime $fechaLiquidacion
     * @return LiquidacionMaterial
     */
    public function setFechaLiquidacion($fechaLiquidacion)
    {
        $this->fechaLiquidacion = $fechaLiquidacion;
    
        return $this;
    }

    /**
     * Get fechaLiquidacion
     *
     * @return \DateTime 
     */
    public function getFechaLiquidacion()
    {
        return $this->fechaLiquidacion;
    }

    /**
     * Set importe
     *
     * @param float $importe
     * @return LiquidacionMaterial
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
     * Set cliente
     *
     * @param \Petramas\MainBundle\Entity\Cliente $cliente
     * @return LiquidacionMaterial
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
     * Add liquidacion_material_detalles
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionMaterialDetalle $liquidacionMaterialDetalles
     * @return LiquidacionMaterial
     */
    public function addLiquidacionMaterialDetalles(\Petramas\MainBundle\Entity\LiquidacionMaterialDetalle $liquidacionMaterialDetalles)
    {
        $this->liquidacion_material_detalles[] = $liquidacionMaterialDetalles;
    
        return $this;
    }

    /**
     * Remove liquidacion_material_detalles
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionMaterialDetalle $liquidacionMaterialDetalles
     */
    public function removeLiquidacionMaterialDetalles(\Petramas\MainBundle\Entity\LiquidacionMaterialDetalle $liquidacionMaterialDetalles)
    {
        $this->liquidacion_material_detalles->removeElement($liquidacionMaterialDetalles);
    }

    /**
     * Get liquidacion_material_detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionMaterialDetalles()
    {
        return $this->liquidacion_material_detalles;
    }
}