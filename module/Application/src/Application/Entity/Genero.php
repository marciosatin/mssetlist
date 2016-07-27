<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbgenero")
 */
class Genero
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    **/
    private $cdGenero;

    /**
     * @ORM\Column(type="string")
     */
    private $stNome;

    public function getCdGenero()
    {
        return $this->cdGenero;
    }

    public function getStNome()
    {
        return $this->stNome;
    }

    public function setCdGenero($cdGenero)
    {
        $this->cdGenero = $cdGenero;
    }

    public function setStNome($stNome)
    {
        $this->stNome = $stNome;
    }

}
