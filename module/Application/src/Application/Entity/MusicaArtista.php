<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbmusicaartista")
 * @ORM\Entity(repositoryClass="Application\Entity\MusicaArtistaRepository")
 */
class MusicaArtista
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * */
    private $cdMusicaArtista;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Artista")
     * @ORM\JoinColumn(name="cdArtista", referencedColumnName="cdArtista")
     */
    private $artista;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Musica")
     * @ORM\JoinColumn(name="cdMusica", referencedColumnName="cdMusica")
     */
    private $musica;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Genero")
     * @ORM\JoinColumn(name="cdGenero", referencedColumnName="cdGenero")
     */
    private $genero;

    /**
     * @ORM\Column(type="string")
     */
    private $stLinkVideo;

    /**
     * @ORM\Column(type="string")
     */
    private $stLinkCifra;

    /**
     * @ORM\Column(type="string")
     */
    private $stTempoDuracao;

    /**
     * @ORM\Column(type="string")
     */
    private $stTom;

    public function getCdMusicaArtista()
    {
        return $this->cdMusicaArtista;
    }

    public function getArtista()
    {
        return $this->artista;
    }

    public function getMusica()
    {
        return $this->musica;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getStLinkVideo()
    {
        return $this->stLinkVideo;
    }

    public function getStLinkCifra()
    {
        return $this->stLinkCifra;
    }

    public function getStTempoDuracao()
    {
        return $this->stTempoDuracao;
    }

    public function getStTom()
    {
        return $this->stTom;
    }

    public function setCdMusicaArtista($cdMusicaArtista)
    {
        $this->cdMusicaArtista = $cdMusicaArtista;
    }

    public function setArtista(Artista $artista)
    {
        $this->artista = $artista;
    }

    public function setMusica(Musica $musica)
    {
        $this->musica = $musica;
    }

    public function setGenero(Genero $genero)
    {
        $this->genero = $genero;
    }

    public function setStLinkVideo($stLinkVideo)
    {
        $this->stLinkVideo = $stLinkVideo;
    }

    public function setStLinkCifra($stLinkCifra)
    {
        $this->stLinkCifra = $stLinkCifra;
    }

    public function setStTempoDuracao($stTempoDuracao)
    {
        $this->stTempoDuracao = $stTempoDuracao;
    }

    public function setStTom($stTom)
    {
        $this->stTom = $stTom;
    }

}
