<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Unidad
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\UnidadRepository")
 */
class Unidad
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
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="unidades")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */
    protected $estado;
    
    /**
     * @ORM\OneToMany(targetEntity="BoletaRecepcion", mappedBy="unidad")
     */
    protected $boleta_recepciones;
    
    /**
     * @ORM\OneToMany(targetEntity="Incidencia", mappedBy="unidad")
     */
    protected $incidencias;
    
    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_mantenimiento", type="datetime")
     */
    private $fechaMantenimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="kilometraje", type="integer")
     */
    private $kilometraje;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tiempo", type="datetime")
     */
    private $tiempo;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boleta_recepciones = new ArrayCollection();
        $this->incidencias = new ArrayCollection();
    }

    /**
     * Magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getMarca();
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
     * Set marca
     *
     * @param string $marca
     * @return Unidad
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    
        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set fechaMantenimiento
     *
     * @param \DateTime $fechaMantenimiento
     * @return Unidad
     */
    public function setFechaMantenimiento($fechaMantenimiento)
    {
        $this->fechaMantenimiento = $fechaMantenimiento;
    
        return $this;
    }

    /**
     * Get fechaMantenimiento
     *
     * @return \DateTime 
     */
    public function getFechaMantenimiento()
    {
        return $this->fechaMantenimiento;
    }

    /**
     * Set kilometraje
     *
     * @param integer $kilometraje
     * @return Unidad
     */
    public function setKilometraje($kilometraje)
    {
        $this->kilometraje = $kilometraje;
    
        return $this;
    }

    /**
     * Get kilometraje
     *
     * @return integer 
     */
    public function getKilometraje()
    {
        return $this->kilometraje;
    }

    /**
     * Set tiempo
     *
     * @param \DateTime $tiempo
     * @return Unidad
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;
    
        return $this;
    }

    /**
     * Get tiempo
     *
     * @return \DateTime 
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set estado
     *
     * @param \Petramas\MainBundle\Entity\Estado $estado
     * @return Unidad
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

    /**
     * Add boleta_recepciones
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones
     * @return Unidad
     */
    public function addBoletaRecepciones(\Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones)
    {
        $this->boleta_recepciones[] = $boletaRecepciones;
    
        return $this;
    }

    /**
     * Remove boleta_recepciones
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones
     */
    public function removeBoletaRecepciones(\Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones)
    {
        $this->boleta_recepciones->removeElement($boletaRecepciones);
    }

    /**
     * Get boleta_recepciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoletaRecepciones()
    {
        return $this->boleta_recepciones;
    }

    /**
     * Add incidencias
     *
     * @param \Petramas\MainBundle\Entity\Incidencia $incidencias
     * @return Unidad
     */
    public function addIncidencias(\Petramas\MainBundle\Entity\Incidencia $incidencias)
    {
        $this->incidencias[] = $incidencias;
    
        return $this;
    }

    /**
     * Remove incidencias
     *
     * @param \Petramas\MainBundle\Entity\Incidencia $incidencias
     */
    public function removeIncidencias(\Petramas\MainBundle\Entity\Incidencia $incidencias)
    {
        $this->incidencias->removeElement($incidencias);
    }

    /**
     * Get incidencias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIncidencias()
    {
        return $this->incidencias;
    }
}