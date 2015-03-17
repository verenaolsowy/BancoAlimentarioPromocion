<?php  
// src/Acme/UserBundle/Entity/User.php

namespace Acme\UserBundle\Entity; 

use FOS\UserBundle\Model\User as BaseUser;  
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser  
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        // Mantener esta l�nea para llamar al constructor
        // de la clase padre
        parent::__construct();

        // Aqu� podremos a�adir el c�digo necesario.
    }
}