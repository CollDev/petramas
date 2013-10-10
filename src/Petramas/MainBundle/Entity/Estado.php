<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\EstadoRepository")
 */
class Estado
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
     * @ORM\OneToMany(targetEntity="BoletaRecepcion", mappedBy="estado")
     */
    protected $boleta_recepciones;

    /**
     * @ORM\OneToMany(targetEntity="Cliente", mappedBy="estado")
     */
    protected $clientes;
    
    /**
     * @ORM\OneToMany(targetEntity="Incidencia", mappedBy="estado")
     */
    protected $incidencias;
    
    /**
     * @ORM\OneToMany(targetEntity="LiquidacionRecepcion", mappedBy="estado")
     */
    protected $liquidacion_recepciones;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    
    public function __construct() {
        $this->boleta_recepciones = new ArrayCollection();
        $this->clientes = new ArrayCollection();
        $this->incidencias = new ArrayCollection();
        $this->liquidacion_recepciones = new ArrayCollection();
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
     * @return Estado
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
}
