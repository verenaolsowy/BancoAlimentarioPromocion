<?php

namespace Acme\PedidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoPedido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\PedidoBundle\Entity\EstadoPedidoRepository")
 */
class EstadoPedido
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=20)
     */
    private $descripcion;

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
     * Set descripcion
     *
     * @param string $descripcion
     * @return EstadoPedido
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * @return EstadoPedido
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
