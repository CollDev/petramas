<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Estado
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\EstadoRepository")
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
     * @ORM\OneToMany(targetEntity="MovimientoIndicador", mappedBy="estado")
     */
    protected $movimiento_indicadores;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="estado")
     */
    protected $pedidos;
    
    /**
     * @ORM\OneToMany(targetEntity="Unidad", mappedBy="estado")
     */
    protected $unidades;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    
    /**
     * Constructor
     */
    public function __construct() {
        $this->boleta_recepciones = new ArrayCollection();
        $this->clientes = new ArrayCollection();
        $this->incidencias = new ArrayCollection();
        $this->liquidacion_recepciones = new ArrayCollection();
        $this->movimiento_indicadores = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
        $this->unidades = new ArrayCollection();
    }

    /**
     * Magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getNombre();
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

    /**
     * Add boleta_recepciones
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones
     * @return Estado
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
     * Add clientes
     *
     * @param \Petramas\MainBundle\Entity\Cliente $clientes
     * @return Estado
     */
    public function addClientes(\Petramas\MainBundle\Entity\Cliente $clientes)
    {
        $this->clientes[] = $clientes;
    
        return $this;
    }

    /**
     * Remove clientes
     *
     * @param \Petramas\MainBundle\Entity\Cliente $clientes
     */
    public function removeClientes(\Petramas\MainBundle\Entity\Cliente $clientes)
    {
        $this->clientes->removeElement($clientes);
    }

    /**
     * Get clientes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * Add incidencias
     *
     * @param \Petramas\MainBundle\Entity\Incidencia $incidencias
     * @return Estado
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

    /**
     * Add liquidacion_recepciones
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones
     * @return Estado
     */
    public function addLiquidacionRecepciones(\Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones)
    {
        $this->liquidacion_recepciones[] = $liquidacionRecepciones;
    
        return $this;
    }

    /**
     * Remove liquidacion_recepciones
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones
     */
    public function removeLiquidacionRecepciones(\Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones)
    {
        $this->liquidacion_recepciones->removeElement($liquidacionRecepciones);
    }

    /**
     * Get liquidacion_recepciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionRecepciones()
    {
        return $this->liquidacion_recepciones;
    }

    /**
     * Add movimiento_indicadores
     *
     * @param \Petramas\MainBundle\Entity\MovimientoIndicador $movimientoIndicadores
     * @return Estado
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
     * Add pedidos
     *
     * @param \Petramas\MainBundle\Entity\Pedido $pedidos
     * @return Estado
     */
    public function addPedidos(\Petramas\MainBundle\Entity\Pedido $pedidos)
    {
        $this->pedidos[] = $pedidos;
    
        return $this;
    }

    /**
     * Remove pedidos
     *
     * @param \Petramas\MainBundle\Entity\Pedido $pedidos
     */
    public function removePedidos(\Petramas\MainBundle\Entity\Pedido $pedidos)
    {
        $this->pedidos->removeElement($pedidos);
    }

    /**
     * Get pedidos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * Add unidades
     *
     * @param \Petramas\MainBundle\Entity\Unidad $unidades
     * @return Estado
     */
    public function addUnidades(\Petramas\MainBundle\Entity\Unidad $unidades)
    {
        $this->unidades[] = $unidades;
    
        return $this;
    }

    /**
     * Remove unidades
     *
     * @param \Petramas\MainBundle\Entity\Unidad $unidades
     */
    public function removeUnidades(\Petramas\MainBundle\Entity\Unidad $unidades)
    {
        $this->unidades->removeElement($unidades);
    }

    /**
     * Get unidades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnidades()
    {
        return $this->unidades;
    }
}