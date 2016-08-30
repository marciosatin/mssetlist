<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

class MusicaArtistaRepository extends EntityRepository
{

    public function buscarPorNomeSetlistItem($searchterm)
    {
        return $this->_em->createQuery("SELECT ma.cdMusicaArtista, m.stNome FROM Application\Entity\MusicaArtista ma JOIN ma.musica m WHERE m.stNome like :searchterm")
                        ->setParameter('searchterm', '%' . $searchterm . '%')
                        ->getResult();
    }

}
