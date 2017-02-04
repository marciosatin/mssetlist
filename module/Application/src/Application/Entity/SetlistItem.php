<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbsetlistitem")
 */
class SetlistItem
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $cdSetlistItem;

    /**
     * @ORM\Column(type="integer")
     */
    private $cdSetlist;

    /**
     * @ORM\Column(type="integer")
     */
    private $cdMusicaArtista;


    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Setlist")
     * @ORM\JoinColumn(name="cdSetlist", referencedColumnName="cdSetlist")
     */
    private $setlist;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\MusicaArtista")
     * @ORM\JoinColumn(name="cdMusicaArtista", referencedColumnName="cdMusicaArtista")
     */
    private $musicaartista;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dtCadastro;

    public function __construct()
    {
        $this->dtCadastro = new \DateTime();
    }


    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }

    public function getCdSetlist()
    {
        return $this->cdSetlist;
    }

    public function getCdMusicaArtista()
    {
        return $this->cdMusicaArtista;
    }

    public function setCdSetlist($cdSetlist)
    {
        $this->cdSetlist = $cdSetlist;
    }

    public function setCdMusicaArtista($cdMusicaArtista)
    {
        $this->cdMusicaArtista = $cdMusicaArtista;
    }

    public function getSetlist()
    {
        return $this->setlist;
    }

    public function getMusicaartista()
    {
        return $this->musicaartista;
    }

    public function setSetlist(Setlist $setlist)
    {
        $this->setlist = $setlist;
    }

    public function setMusicaartista(MusicaArtista $musicaartista)
    {
        $this->musicaartista = $musicaartista;
    }

    public function getCdSetlistItem()
    {
        return $this->cdSetlistItem;
    }

    public function setCdSetlistItem($cdSetlistItem)
    {
        $this->cdSetlistItem = $cdSetlistItem;
    }

}
