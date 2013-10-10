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
     * @ORM\ManyToOne(targetEntity="BoletaRecepcion", inversedBy="estados")
     * @ORM\JoinColumn(name="boleta_recepcion_id", referencedColumnName="id")
     */
    protected $boleta_recepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="estados")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    protected $cliente;
    
    /**
     * @ORM\ManyToOne(targetEntity="Incidencia", inversedBy="estados")
     * @ORM\JoinColumn(name="incidencia_id", referencedColumnName="id")
     */
    protected $incidencia;
    
    /**
     * @ORM\ManyToOne(targetEntity="LiquidacionRecepcion", inversedBy="estados")
     * @ORM\JoinColumn(name="liquidacion_recepcion_id", referencedColumnName="id")
     */
    protected $liquidacion_recepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="MovimientoIndicador", inversedBy="estados")
     * @ORM\JoinColumn(name="movimiento_indicador_id", referencedColumnName="id")
     */
    protected $movimiento_indicador;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


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
