<?php

namespace Acme\PedidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PedidoModelo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\PedidoBundle\Entity\PedidoModeloRepository")
 */
class PedidoModelo
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
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", unique=true)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date")
     */
    private $fechaIngreso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="con_envio", type="boolean")
     */
    private $conEnvio;

    /**
     * @ORM\ManyToOne(targetEntity="EstadoPedido", inversedBy="pedidosModelo")
     * @ORM\JoinColumn(name="estado_pedido_id", referencedColumnName="id")
     */
    protected $estado_pedido_id;

    /**
     * @ORM\ManyToOne(targetEntity="TurnoEntrega", inversedBy="pedidosModelo")
     * @ORM\JoinColumn(name="turno_entrega_id", referencedColumnName="id")
     */
    protected $turno_entrega_id;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\EntidadReceptoraBundle\Entity\EntidadReceptora", inversedBy="pedidosModelo")
     * @ORM\JoinColumn(name="entidad_receptora_id", referencedColumnName="id")
     */
    protected $entidad_receptora_id;

    /**
     * @ORM\OneToMany(targetEntity="AlimentoPedido", mappedBy="pedido_modelo")
     */
    protected $alimentos;

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
     * Set numero
     *
     * @param integer $numero
     * @return PedidoModelo
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return PedidoModelo
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
     * Set conEnvio
     *
     * @param boolean $conEnvio
     * @return PedidoModelo
     */
    public function setConEnvio($conEnvio)
    {
        $this->conEnvio = $conEnvio;

        return $this;
    }

    /**
     * Get conEnvio
     *
     * @return boolean 
     */
    public function getConEnvio()
    {
        return $this->conEnvio;
    }

    /**
     * Set estado_pedido_id
     *
     * @param \Acme\PedidoBundle\Entity\EstadoPedido $estadoPedidoId
     * @return PedidoModelo
     */
    public function setEstadoPedidoId(\Acme\PedidoBundle\Entity\EstadoPedido $estadoPedidoId = null)
    {
        $this->estado_pedido_id = $estadoPedidoId;

        return $this;
    }

    /**
     * Get estado_pedido_id
     *
     * @return \Acme\PedidoBundle\Entity\EstadoPedido 
     */
    public function getEstadoPedidoId()
    {
        return $this->estado_pedido_id;
    }

    /**
     * Set turno_entrega_id
     *
     * @param \Acme\PedidoBundle\Entity\TurnoEntrega $turnoEntregaId
     * @return PedidoModelo
     */
    public function setTurnoEntregaId(\Acme\PedidoBundle\Entity\TurnoEntrega $turnoEntregaId = null)
    {
        $this->turno_entrega_id = $turnoEntregaId;

        return $this;
    }

    /**
     * Get turno_entrega_id
     *
     * @return \Acme\PedidoBundle\Entity\TurnoEntrega 
     */
    public function getTurnoEntregaId()
    {
        return $this->turno_entrega_id;
    }

    /**
     * Set entidad_receptora_id
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\EntidadReceptora $entidadReceptoraId
     * @return PedidoModelo
     */
    public function setEntidadReceptoraId(\Acme\EntidadReceptoraBundle\Entity\EntidadReceptora $entidadReceptoraId = null)
    {
        $this->entidad_receptora_id = $entidadReceptoraId;

        return $this;
    }

    /**
     * Get entidad_receptora_id
     *
     * @return \Acme\EntidadReceptoraBundle\Entity\EntidadReceptora 
     */
    public function getEntidadReceptoraId()
    {
        return $this->entidad_receptora_id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alimentos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add alimentos
     *
     * @param \Acme\PedidoBundle\Entity\AlimentoPedido $alimentos
     * @return PedidoModelo
     */
    public function addAlimento(\Acme\PedidoBundle\Entity\AlimentoPedido $alimentos)
    {
        $this->alimentos[] = $alimentos;

        return $this;
    }

    /**
     * Remove alimentos
     *
     * @param \Acme\PedidoBundle\Entity\AlimentoPedido $alimentos
     */
    public function removeAlimento(\Acme\PedidoBundle\Entity\AlimentoPedido $alimentos)
    {
        $this->alimentos->removeElement($alimentos);
    }

    /**
     * Get alimentos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlimentos()
    {
        return $this->alimentos;
    }
}
