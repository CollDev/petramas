<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Indicador
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\IndicadorRepository")
 */
class Indicador
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
     * @ORM\OneToMany(targetEntity="MovimientoIndicador", mappedBy="indicador")
     */
    protected $movimiento_indicadores;
    
    /**
     * @ORM\OneToMany(targetEntity="Tope", mappedBy="indicador")
     */
    protected $topes;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="estandar", type="string", length=255)
     */
    private $estandar;

    /**
     * @var float
     *
     * @ORM\Column(name="inferior", type="decimal")
     */
    private $inferior;

    /**
     * @var float
     *
     * @ORM\Column(name="superior", type="decimal")
     */
    private $superior;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="decimal")
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    private $observacion;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movimiento_indicadores = new ArrayCollection();
        $this->topes = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Indicador
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set estandar
     *
     * @param string $estandar
     * @return Indicador
     */
    public function setEstandar($estandar)
    {
        $this->estandar = $estandar;
    
        return $this;
    }

    /**
     * Get estandar
     *
     * @return string 
     */
    public function getEstandar()
    {
        return $this->estandar;
    }

    /**
     * Set inferior
     *
     * @param float $inferior
     * @return Indicador
     */
    public function setInferior($inferior)
    {
        $this->inferior = $inferior;
    
        return $this;
    }

    /**
     * Get inferior
     *
     * @return float 
     */
    public function getInferior()
    {
        return $this->inferior;
    }

    /**
     * Set superior
     *
     * @param float $superior
     * @return Indicador
     */
    public function setSuperior($superior)
    {
        $this->superior = $superior;
    
        return $this;
    }

    /**
     * Get superior
     *
     * @return float 
     */
    public function getSuperior()
    {
        return $this->superior;
    }

    /**
     * Set valor
     *
     * @param float $valor
     * @return Indicador
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Indicador
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Add movimiento_indicadores
     *
     * @param \Petramas\MainBundle\Entity\MovimientoIndicador $movimientoIndicadores
     * @return Indicador
     */
    public function addMovimientoIndicadores(\Petramas\MainBundle\Entity\MovimientoIndicador $movimientoIndicadores)
    {
        $this->movimiento_indicadores[] = $movimientoIndicadores;
    
        return $this;
    }

    /**
     * Remove movimiento_indicadores
     *
     * @param \Petramas\MainBundle\Entity\MovimientoIndicador $movimientoIndicadores
     */
    public function removeMovimientoIndicadores(\Petramas\MainBundle\Entity\MovimientoIndicador $movimientoIndicadores)
    {
        $this->movimiento_indicadores->removeElement($movimientoIndicadores);
    }

    /**
     * Get movimiento_indicadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovimientoIndicadores()
    {
        return $this->movimiento_indicadores;
    }

    /**
     * Add topes
     *
     * @param \Petramas\MainBundle\Entity\Tope $topes
     * @return Indicador
     */
    public function addTopes(\Petramas\MainBundle\Entity\Tope $topes)
    {
        $this->topes[] = $topes;
    
        return $this;
    }

    /**
     * Remove topes
     *
     * @param \Petramas\MainBundle\Entity\Tope $topes
     */
    public function removeTopes(\Petramas\MainBundle\Entity\Tope $topes)
    {
        $this->topes->removeElement($topes);
    }

    /**
     * Get topes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopes()
    {
        return $this->topes;
    }
}