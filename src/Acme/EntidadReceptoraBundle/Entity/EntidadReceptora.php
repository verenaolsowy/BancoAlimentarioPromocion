<?php

namespace Acme\EntidadReceptoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntidadReceptora
 */
class EntidadReceptora
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $razonSocial;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $domicilio;

    /**
     * @var string
     */
    private $latitud;

    /**
     * @var string
     */
    private $longitud;


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
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return EntidadReceptora
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return EntidadReceptora
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return EntidadReceptora
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return EntidadReceptora
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return EntidadReceptora
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }
    /**
     * @var \Acme\EntidadReceptoraBundle\Entity\EstadoEntidad
     */
    private $estado_entidad_id;

    /**
     * @var \Acme\EntidadReceptoraBundle\Entity\NecesidadEntidad
     */
    private $necesidad_entidad_id;

    /**
     * @var \Acme\EntidadReceptoraBundle\Entity\ServicioPrestado
     */
    private $servicio_prestado_id;


    /**
     * Set estado_entidad_id
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\EstadoEntidad $estadoEntidadId
     * @return EntidadReceptora
     */
    public function setEstadoEntidadId(\Acme\EntidadReceptoraBundle\Entity\EstadoEntidad $estadoEntidadId = null)
    {
        $this->estado_entidad_id = $estadoEntidadId;

        return $this;
    }

    /**
     * Get estado_entidad_id
     *
     * @return \Acme\EntidadReceptoraBundle\Entity\EstadoEntidad 
     */
    public function getEstadoEntidadId()
    {
        return $this->estado_entidad_id;
    }

    /**
     * Set necesidad_entidad_id
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\NecesidadEntidad $necesidadEntidadId
     * @return EntidadReceptora
     */
    public function setNecesidadEntidadId(\Acme\EntidadReceptoraBundle\Entity\NecesidadEntidad $necesidadEntidadId = null)
    {
        $this->necesidad_entidad_id = $necesidadEntidadId;

        return $this;
    }

    /**
     * Get necesidad_entidad_id
     *
     * @return \Acme\EntidadReceptoraBundle\Entity\NecesidadEntidad 
     */
    public function getNecesidadEntidadId()
    {
        return $this->necesidad_entidad_id;
    }

    /**
     * Set servicio_prestado_id
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\ServicioPrestado $servicioPrestadoId
     * @return EntidadReceptora
     */
    public function setServicioPrestadoId(\Acme\EntidadReceptoraBundle\Entity\ServicioPrestado $servicioPrestadoId = null)
    {
        $this->servicio_prestado_id = $servicioPrestadoId;

        return $this;
    }

    /**
     * Get servicio_prestado_id
     *
     * @return \Acme\EntidadReceptoraBundle\Entity\ServicioPrestado 
     */
    public function getServicioPrestadoId()
    {
        return $this->servicio_prestado_id;
    }
    /**
     * @var \Acme\EntidadReceptoraBundle\Entity\EstadoEntidad
     */
    private $estado_entidad;


    /**
     * Set estado_entidad
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\EstadoEntidad $estadoEntidad
     * @return EntidadReceptora
     */
    public function setEstadoEntidad(\Acme\EntidadReceptoraBundle\Entity\EstadoEntidad $estadoEntidad = null)
    {
        $this->estado_entidad = $estadoEntidad;

        return $this;
    }

    /**
     * Get estado_entidad
     *
     * @return \Acme\EntidadReceptoraBundle\Entity\EstadoEntidad 
     */
    public function getEstadoEntidad()
    {
        return $this->estado_entidad;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pedidosModelo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pedidosModelo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pedidosModelo
     *
     * @param \Acme\PedidoBundle\Entity\PedidoModelo $pedidosModelo
     * @return EntidadReceptora
     */
    public function addPedidosModelo(\Acme\PedidoBundle\Entity\PedidoModelo $pedidosModelo)
    {
        $this->pedidosModelo[] = $pedidosModelo;

        return $this;
    }

    /**
     * Remove pedidosModelo
     *
     * @param \Acme\PedidoBundle\Entity\PedidoModelo $pedidosModelo
     */
    public function removePedidosModelo(\Acme\PedidoBundle\Entity\PedidoModelo $pedidosModelo)
    {
        $this->pedidosModelo->removeElement($pedidosModelo);
    }

    /**
     * Get pedidosModelo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidosModelo()
    {
        return $this->pedidosModelo;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $entregasDirectas;


    /**
     * Add entregasDirectas
     *
     * @param \Acme\PedidoBundle\Entity\EntregaDirecta $entregasDirectas
     * @return EntidadReceptora
     */
    public function addEntregasDirecta(\Acme\PedidoBundle\Entity\EntregaDirecta $entregasDirectas)
    {
        $this->entregasDirectas[] = $entregasDirectas;

        return $this;
    }

    /**
     * Remove entregasDirectas
     *
     * @param \Acme\PedidoBundle\Entity\EntregaDirecta $entregasDirectas
     */
    public function removeEntregasDirecta(\Acme\PedidoBundle\Entity\EntregaDirecta $entregasDirectas)
    {
        $this->entregasDirectas->removeElement($entregasDirectas);
    }

    /**
     * Get entregasDirectas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntregasDirectas()
    {
        return $this->entregasDirectas;
    }
}
