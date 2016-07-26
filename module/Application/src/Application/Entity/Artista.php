<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbartista")
 */
class Artista
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    **/
    private $cdArtista;

    /**
     * @ORM\Column(type="string")
     */
    private $stNome;

    public function getCdArtista()
    {
        return $this->cdArtista;
    }

    public function getStNome()
    {
        return $this->stNome;
    }

    public function setCdArtista($cdArtista)
    {
        $this->cdArtista = $cdArtista;
    }

    public function setStNome($stNome)
    {
        $this->stNome = $stNome;
    }

}
