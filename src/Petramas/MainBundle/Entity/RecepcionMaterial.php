<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecepcionMaterial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\RecepcionMaterialRepository")
 */
class RecepcionMaterial
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
     * @ORM\ManyToOne(targetEntity="BoletaRecepcion", inversedBy="recepcion_materiales")
     * @ORM\JoinColumn(name="boleta_recepcion_id", referencedColumnName="id")
     */
    protected $boleta_recepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Material", inversedBy="recepcion_materiales")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $material;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadMedida", inversedBy="recepcion_materiales")
     * @ORM\JoinColumn(name="unidad_medida_id", referencedColumnName="id")
     */
    protected $unidad_medida;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="recepcion_materiales")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $usuario;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */
    private $fechaIngreso;

    /**
     * @var float
     *
     * @ORM\Column(name="cantidad", type="decimal")
     */
    private $cantidad;


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
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return RecepcionMaterial
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;
    
        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set cantidad
     *
     * @param float $cantidad
     * @return RecepcionMaterial
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set boleta_recepcion
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepcion
     * @return RecepcionMaterial
     */
    public function setBoletaRecepcion(\Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepcion = null)
    {
        $this->boleta_recepcion = $boletaRecepcion;
    
        return $this;
    }

    /**
     * Get boleta_recepcion
     *
     * @return \Petramas\MainBundle\Entity\BoletaRecepcion 
     */
    public function getBoletaRecepcion()
    {
        return $this->boleta_recepcion;
    }

    /**
     * Set material
     *
     * @param \Petramas\MainBundle\Entity\Material $material
     * @return RecepcionMaterial
     */
    public function setMaterial(\Petramas\MainBundle\Entity\Material $material = null)
    {
        $this->material = $material;
    
        return $this;
    }

    /**
     * Get material
     *
     * @return \Petramas\MainBundle\Entity\Material 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set unidad_medida
     *
     * @param \Petramas\MainBundle\Entity\UnidadMedida $unidadMedida
     * @return RecepcionMaterial
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

    /**
     * Set usuario
     *
     * @param \Petramas\MainBundle\Entity\Usuario $usuario
     * @return RecepcionMaterial
     */
    public function setUsuario(\Petramas\MainBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Petramas\MainBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}