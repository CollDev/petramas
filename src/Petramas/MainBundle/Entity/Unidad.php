<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidad
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\UnidadRepository")
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
     * @ORM\ManyToOne(targetEntity="BoletaRecepcion", inversedBy="unidades")
     * @ORM\JoinColumn(name="boleta_recepcion_id", referencedColumnName="id")
     */
    protected $boleta_recepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Incidencia", inversedBy="unidades")
     * @ORM\JoinColumn(name="incidencia_id", referencedColumnName="id")
     */
    protected $incidencia;
    
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
}
