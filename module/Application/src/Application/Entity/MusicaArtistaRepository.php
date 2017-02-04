<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

class MusicaArtistaRepository extends EntityRepository
{

    private function isValidSearch($cdSetList) {
        $setList = $this->_em->getRepository('Application\Entity\Setlist')->find((int) $cdSetList);
        if (null === $setList) {
            throw new \Exception('Setlist inexistente.');
        }
    }

    public function buscarPorNomeSetlistItem($cdSetList, $searchterm)
    {
        $this->isValidSearch($cdSetList);
        return $this->_em->createQuery("SELECT ma.cdMusicaArtista, m.stNome FROM Application\Entity\MusicaArtista ma JOIN ma.musica m JOIN ma.artista a WHERE ma.cdMusicaArtista NOT IN (SELECT si.cdMusicaArtista FROM Application\Entity\SetlistItem si WHERE si.cdSetlist = :cdSetlist) AND (m.stNome like :searchterm OR a.stNome like :searchterm)")
                        ->setParameter('searchterm', '%' . $searchterm . '%')
                        ->setParameter('cdSetlist', $cdSetList)
                        ->getResult()
                ;
    }

}
