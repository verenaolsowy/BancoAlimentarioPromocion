<?php

namespace Acme\AlimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleAlimento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\AlimentoBundle\Entity\DetalleAlimentoRepository")
 */
class DetalleAlimento
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
     * @ORM\Column(name="fecha_vencimiento", type="date")
     */
    private $fechaVencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="string", length=200)
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="peso_unitario", type="decimal")
     */
    private $pesoUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservado", type="integer")
     */
    private $reservado;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Alimento", inversedBy="detallesAlimento")
     * @ORM\JoinColumn(name="alimento_codigo", referencedColumnName="codigo")
     */
    private $alimento_codigo;

    /**
     * @ORM\OneToMany(targetEntity="Acme\AlimentoBundle\Entity\AlimentoDonante", mappedBy="detalle_alimento")
     */
    protected $alimento_donante;

    /**
     * @ORM\OneToMany(targetEntity="Acme\PedidoBundle\Entity\AlimentoPedido", mappedBy="detalle_alimento")
     */
    protected $pedidos;

    /**
     * @ORM\OneToMany(targetEntity="Acme\PedidoBundle\Entity\AlimentoEntregaDirecta", mappedBy="detalle_alimento")
     */
    protected $entregas_directas;

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
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return DetalleAlimento
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return DetalleAlimento
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set pesoUnitario
     *
     * @param string $pesoUnitario
     * @return DetalleAlimento
     */
    public function setPesoUnitario($pesoUnitario)
    {
        $this->pesoUnitario = $pesoUnitario;

        return $this;
    }

    /**
     * Get pesoUnitario
     *
     * @return string 
     */
    public function getPesoUnitario()
    {
        return $this->pesoUnitario;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return DetalleAlimento
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set reservado
     *
     * @param integer $reservado
     * @return DetalleAlimento
     */
    public function setReservado($reservado)
    {
        $this->reservado = $reservado;

        return $this;
    }

    /**
     * Get reservado
     *
     * @return integer 
     */
    public function getReservado()
    {
        return $this->reservado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alimento_donante = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set alimento_codigo
     *
     * @param \Acme\AlimentoBundle\Entity\Alimento $alimentoCodigo
     * @return DetalleAlimento
     */
    public function setAlimentoCodigo(\Acme\AlimentoBundle\Entity\Alimento $alimentoCodigo = null)
    {
        $this->alimento_codigo = $alimentoCodigo;

        return $this;
    }

    /**
     * Get alimento_codigo
     *
     * @return \Acme\AlimentoBundle\Entity\Alimento 
     */
    public function getAlimentoCodigo()
    {
        return $this->alimento_codigo;
    }

    /**
     * Add alimento_donante
     *
     * @param \Acme\AlimentoBundle\Entity\AlimentoDonante $alimentoDonante
     * @return DetalleAlimento
     */
    public function addAlimentoDonante(\Acme\AlimentoBundle\Entity\AlimentoDonante $alimentoDonante)
    {
        $this->alimento_donante[] = $alimentoDonante;

        return $this;
    }

    /**
     * Remove alimento_donante
     *
     * @param \Acme\AlimentoBundle\Entity\AlimentoDonante $alimentoDonante
     */
    public function removeAlimentoDonante(\Acme\AlimentoBundle\Entity\AlimentoDonante $alimentoDonante)
    {
        $this->alimento_donante->removeElement($alimentoDonante);
    }

    /**
     * Get alimento_donante
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlimentoDonante()
    {
        return $this->alimento_donante;
    }

    /**
     * Add pedidos
     *
     * @param \Acme\PedidoBundle\entity\AlimentoPedido $pedidos
     * @return DetalleAlimento
     */
    public function addPedido(\Acme\PedidoBundle\entity\AlimentoPedido $pedidos)
    {
        $this->pedidos[] = $pedidos;

        return $this;
    }

    /**
     * Remove pedidos
     *
     * @param \Acme\PedidoBundle\entity\AlimentoPedido $pedidos
     */
    public function removePedido(\Acme\PedidoBundle\entity\AlimentoPedido $pedidos)
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
     * Add entregas_directas
     *
     * @param \Acme\PedidoBundle\Entity\AlimentoEntregaDirecta $entregasDirectas
     * @return DetalleAlimento
     */
    public function addEntregasDirecta(\Acme\PedidoBundle\Entity\AlimentoEntregaDirecta $entregasDirectas)
    {
        $this->entregas_directas[] = $entregasDirectas;

        return $this;
    }

    /**
     * Remove entregas_directas
     *
     * @param \Acme\PedidoBundle\Entity\AlimentoEntregaDirecta $entregasDirectas
     */
    public function removeEntregasDirecta(\Acme\PedidoBundle\Entity\AlimentoEntregaDirecta $entregasDirectas)
    {
        $this->entregas_directas->removeElement($entregasDirectas);
    }

    /**
     * Get entregas_directas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntregasDirectas()
    {
        return $this->entregas_directas;
    }
}
