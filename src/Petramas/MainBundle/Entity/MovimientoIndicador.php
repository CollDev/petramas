<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovimientoIndicador
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\MovimientoIndicadorRepository")
 */
class MovimientoIndicador
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
     * @ORM\ManyToOne(targetEntity="Indicador", inversedBy="movimiento_indicadores")
     * @ORM\JoinColumn(name="indicador_id", referencedColumnName="id")
     */
    protected $indicador;
    
    /**
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="movimiento_indicadores")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */
    protected $estado;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="valor", type="integer")
     */
    private $valor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_movimiento", type="datetime")
     */
    private $fechaMovimiento;


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
     * Set valor
     *
     * @param integer $valor
     * @return MovimientoIndicador
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set fechaMovimiento
     *
     * @param \DateTime $fechaMovimiento
     * @return MovimientoIndicador
     */
    public function setFechaMovimiento($fechaMovimiento)
    {
        $this->fechaMovimiento = $fechaMovimiento;
    
        return $this;
    }

    /**
     * Get fechaMovimiento
     *
     * @return \DateTime 
     */
    public function getFechaMovimiento()
    {
        return $this->fechaMovimiento;
    }

    /**
     * Set indicador
     *
     * @param \Petramas\MainBundle\Entity\Indicador $indicador
     * @return MovimientoIndicador
     */
    public function setIndicador(\Petramas\MainBundle\Entity\Indicador $indicador = null)
    {
        $this->indicador = $indicador;
    
        return $this;
    }

    /**
     * Get indicador
     *
     * @return \Petramas\MainBundle\Entity\Indicador 
     */
    public function getIndicador()
    {
        return $this->indicador;
    }

    /**
     * Set estado
     *
     * @param \Petramas\MainBundle\Entity\Estado $estado
     * @return MovimientoIndicador
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
}