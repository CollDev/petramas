<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TipoIncidencia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\TipoIncidenciaRepository")
 */
class TipoIncidencia
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
     * @ORM\OneToMany(targetEntity="Incidencia", mappedBy="tipo_incidencia")
     */
    protected $incidencias;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->incidencias = new ArrayCollection();
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
     * @return TipoIncidencia
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
     * Add incidencias
     *
     * @param \Petramas\MainBundle\Entity\Incidencia $incidencias
     * @return TipoIncidencia
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