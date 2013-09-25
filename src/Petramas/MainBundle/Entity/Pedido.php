<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\PedidoRepository")
 */
class Pedido
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
     * @ORM\Column(name="fecha_programacion", type="datetime")
     */
    private $fechaProgramacion;


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
     * Set fechaProgramacion
     *
     * @param \DateTime $fechaProgramacion
     * @return Pedido
     */
    public function setFechaProgramacion($fechaProgramacion)
    {
        $this->fechaProgramacion = $fechaProgramacion;
    
        return $this;
    }

    /**
     * Get fechaProgramacion
     *
     * @return \DateTime 
     */
    public function getFechaProgramacion()
    {
        return $this->fechaProgramacion;
    }
}
