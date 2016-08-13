<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbsetlist")
 */
class Setlist
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    **/
    private $cdSetlist;

    /**
     * @ORM\Column(type="string")
     */
    private $stNome;

    public function getCdSetlist()
    {
        return $this->cdSetlist;
    }

    public function getStNome()
    {
        return $this->stNome;
    }

    public function setCdSetlist($cdSetlist)
    {
        $this->cdSetlist = $cdSetlist;
    }

    public function setStNome($stNome)
    {
        $this->stNome = $stNome;
    }

}
