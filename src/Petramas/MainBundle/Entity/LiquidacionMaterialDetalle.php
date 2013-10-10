<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LiquidacionMaterialDetalle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\LiquidacionMaterialDetalleRepository")
 */
class LiquidacionMaterialDetalle
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
     * @ORM\ManyToOne(targetEntity="LiquidacionMaterial", inversedBy="liquidacion_material_detalles")
     * @ORM\JoinColumn(name="liquidacion_material_id", referencedColumnName="id")
     */
    protected $liquidacion_material;

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
     * Set importe
     *
     * @param float $importe
     * @return LiquidacionMaterialDetalle
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
     * Set liquidacion_material
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionMaterial $liquidacionMaterial
     * @return LiquidacionMaterialDetalle
     */
    public function setLiquidacionMaterial(\Petramas\MainBundle\Entity\LiquidacionMaterial $liquidacionMaterial = null)
    {
        $this->liquidacion_material = $liquidacionMaterial;
    
        return $this;
    }

    /**
     * Get liquidacion_material
     *
     * @return \Petramas\MainBundle\Entity\LiquidacionMaterial 
     */
    public function getLiquidacionMaterial()
    {
        return $this->liquidacion_material;
    }
}