<?php

namespace Acme\EntidadReceptoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntidadReceptora
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\EntidadReceptoraBundle\Entity\EntidadReceptoraRepository")
 */
class EntidadReceptora
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
     * @ORM\Column(name="razon_social", type="string", length=100)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=30)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=200)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="string", length=15)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="logitud", type="string", length=15)
     */
    private $logitud;


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
     * Set logitud
     *
     * @param string $logitud
     * @return EntidadReceptora
     */
    public function setLogitud($logitud)
    {
        $this->logitud = $logitud;

        return $this;
    }

    /**
     * Get logitud
     *
     * @return string 
     */
    public function getLogitud()
    {
        return $this->logitud;
    }
}
