<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovimientoIndicador
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\MovimientoIndicadorRepository")
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
     * @ORM\OneToMany(targetEntity="Indicador", mappedBy="movimiento_indicador")
     */
    protected $indicadores;
    
    /**
     * @ORM\OneToMany(targetEntity="Estado", mappedBy="movimiento_indicador")
     */
    protected $estados;
    
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

    public function __construct()
    {
        $this->indicadores = new ArrayCollection();
        $this->estados = new ArrayCollection();
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
}
