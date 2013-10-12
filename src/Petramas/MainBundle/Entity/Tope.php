<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tope
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\TopeRepository")
 */
class Tope
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
     * @ORM\ManyToOne(targetEntity="Indicador", inversedBy="topes")
     * @ORM\JoinColumn(name="indicador_id", referencedColumnName="id")
     */
    protected $indicador;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadMedida", inversedBy="topes")
     * @ORM\JoinColumn(name="unidad_medida_id", referencedColumnName="id")
     */
    protected $unidad_medida;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="acumulado", type="decimal", precision=10, scale=2)
     */
    private $acumulado;

    /**
     * @var float
     *
     * @ORM\Column(name="previo", type="decimal", precision=10, scale=2)
     */
    private $previo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Topes
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set acumulado
     *
     * @param float $acumulado
     * @return Topes
     */
    public function setAcumulado($acumulado)
    {
        $this->acumulado = $acumulado;
    
        return $this;
    }

    /**
     * Get acumulado
     *
     * @return float 
     */
    public function getAcumulado()
    {
        return $this->acumulado;
    }

    /**
     * Set previo
     *
     * @param float $previo
     * @return Topes
     */
    public function setPrevio($previo)
    {
        $this->previo = $previo;
    
        return $this;
    }

    /**
     * Get previo
     *
     * @return float 
     */
    public function getPrevio()
    {
        return $this->previo;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Topes
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set indicador
     *
     * @param \Petramas\MainBundle\Entity\Indicador $indicador
     * @return Tope
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
     * Set unidad_medida
     *
     * @param \Petramas\MainBundle\Entity\UnidadMedida $unidadMedida
     * @return Tope
     */
    public function setUnidadMedida(\Petramas\MainBundle\Entity\UnidadMedida $unidadMedida = null)
    {
        $this->unidad_medida = $unidadMedida;
    
        return $this;
    }

    /**
     * Get unidad_medida
     *
     * @return \Petramas\MainBundle\Entity\UnidadMedida 
     */
    public function getUnidadMedida()
    {
        return $this->unidad_medida;
    }
}