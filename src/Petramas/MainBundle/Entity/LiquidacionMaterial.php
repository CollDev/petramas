<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_liquidacion", type="datetime")
     */
    private $fechaLiquidacion;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="decimal")
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
}
