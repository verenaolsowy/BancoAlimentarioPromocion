<?php

namespace Acme\PedidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TurnoEntrega
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\PedidoBundle\Entity\TurnoEntregaRepository")
 */
class TurnoEntrega
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
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /**
     * @ORM\OneToMany(targetEntity="PedidoModelo", mappedBy="pedidosModelo")
     */
    protected $pedido_modelo;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return TurnoEntrega
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return TurnoEntrega
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pedido_modelo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pedido_modelo
     *
     * @param \Acme\PedidoBundle\Entity\PedidoModelo $pedidoModelo
     * @return TurnoEntrega
     */
    public function addPedidoModelo(\Acme\PedidoBundle\Entity\PedidoModelo $pedidoModelo)
    {
        $this->pedido_modelo[] = $pedidoModelo;

        return $this;
    }

    /**
     * Remove pedido_modelo
     *
     * @param \Acme\PedidoBundle\Entity\PedidoModelo $pedidoModelo
     */
    public function removePedidoModelo(\Acme\PedidoBundle\Entity\PedidoModelo $pedidoModelo)
    {
        $this->pedido_modelo->removeElement($pedidoModelo);
    }

    /**
     * Get pedido_modelo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidoModelo()
    {
        return $this->pedido_modelo;
    }
}
