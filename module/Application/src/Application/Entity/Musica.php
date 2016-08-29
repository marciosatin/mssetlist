<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbmusica")
 * @ORM\Entity(repositoryClass="Application\Entity\MusicaRepository")
 */
class Musica
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    **/
    private $cdMusica;

    /**
     * @ORM\Column(type="string")
     */
    private $stNome;

    public function getcdMusica()
    {
        return $this->cdMusica;
    }

    public function getStNome()
    {
        return $this->stNome;
    }

    public function setCdMusica($cdMusica)
    {
        $this->cdMusica = $cdMusica;
    }

    public function setStNome($stNome)
    {
        $this->stNome = $stNome;
    }

}
