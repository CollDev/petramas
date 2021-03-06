<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IncidenciaResolucion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\IncidenciaResolucionRepository")
 */
class IncidenciaResolucion
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
     * @ORM\ManyToOne(targetEntity="Incidencia", inversedBy="incidencia_resoluciones")
     * @ORM\JoinColumn(name="incidencia_id", referencedColumnName="id")
     */
    protected $incidencia;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_resolucion", type="datetime")
     */
    private $fechaResolucion;

    /**
     * @var string
     *
     * @ORM\Column(name="resolucion", type="string", length=255)
     */
    private $resolucion;

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
     * Set fechaResolucion
     *
     * @param \DateTime $fechaResolucion
     * @return IncidenciaResolucion
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
     * Set resolucion
     *
     * @param string $resolucion
     * @return IncidenciaResolucion
     */
    public function setResolucion($resolucion)
    {
        $this->resolucion = $resolucion;
    
        return $this;
    }

    /**
     * Get resolucion
     *
     * @return string 
     */
    public function getResolucion()
    {
        return $this->resolucion;
    }

    /**
     * Set incidencia
     *
     * @param \Petramas\MainBundle\Entity\Incidencia $incidencia
     * @return IncidenciaResolucion
     */
    public function setIncidencia(\Petramas\MainBundle\Entity\Incidencia $incidencia = null)
    {
        $this->incidencia = $incidencia;
    
        return $this;
    }

    /**
     * Get incidencia
     *
     * @return \Petramas\MainBundle\Entity\Incidencia 
     */
    public function getIncidencia()
    {
        return $this->incidencia;
    }
}