<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incidencia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\IncidenciaRepository")
 */
class Incidencia
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
     * @ORM\Column(name="fecha_incidencia", type="datetime")
     */
    private $fechaIncidencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_resolucion", type="datetime")
     */
    private $fechaResolucion;

    /**
     * @var string
     *
     * @ORM\Column(name="maquinaria", type="string", length=255)
     */
    private $maquinaria;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    private $observacion;

    /**
     * @var string
     *
     * @ORM\Column(name="solucion", type="string", length=255)
     */
    private $solucion;


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
     * Set fechaIncidencia
     *
     * @param \DateTime $fechaIncidencia
     * @return Incidencia
     */
    public function setFechaIncidencia($fechaIncidencia)
    {
        $this->fechaIncidencia = $fechaIncidencia;
    
        return $this;
    }

    /**
     * Get fechaIncidencia
     *
     * @return \DateTime 
     */
    public function getFechaIncidencia()
    {
        return $this->fechaIncidencia;
    }

    /**
     * Set fechaResolucion
     *
     * @param \DateTime $fechaResolucion
     * @return Incidencia
     */
    public function setFechaResolucion($fechaResolucion)
    {
        $this->fechaResolucion = $fechaResolucion;
    
        return $this;
    }

    /**
     * Get fechaResolucion
     *
     * @return \DateTime 
     */
    public function getFechaResolucion()
    {
        return $this->fechaResolucion;
    }

    /**
     * Set maquinaria
     *
     * @param string $maquinaria
     * @return Incidencia
     */
    public function setMaquinaria($maquinaria)
    {
        $this->maquinaria = $maquinaria;
    
        return $this;
    }

    /**
     * Get maquinaria
     *
     * @return string 
     */
    public function getMaquinaria()
    {
        return $this->maquinaria;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Incidencia
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
     * Set solucion
     *
     * @param string $solucion
     * @return Incidencia
     */
    public function setSolucion($solucion)
    {
        $this->solucion = $solucion;
    
        return $this;
    }

    /**
     * Get solucion
     *
     * @return string 
     */
    public function getSolucion()
    {
        return $this->solucion;
    }
}
