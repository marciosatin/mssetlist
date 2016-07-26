<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Artista as ArtistaEntity;

class Artista
{
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert($stNome)
    {
        $artistaEntity = new ArtistaEntity();
        $artistaEntity->setStNome($stNome);

        $this->em->persist($artistaEntity);
        $this->em->flush();

        return $artistaEntity;
    }
    
    public function update(array $data) {
        $artistaEntity = $this->em
                ->getReference('Application\Entity\Artista', $data['cdArtista']);
        $artistaEntity->setNome($data['stNome']);

        $this->em->persist($artistaEntity);
        $this->em->flush();
        
        return $artistaEntity;
    }
    
    public function delete($cdArtista)
    {
        $artistaEntity = $this->em
                ->getReference('Application\Entity\Artista', $cdArtista);

        $this->em->remove($artistaEntity);
        $this->em->flush();
        
        return $cdArtista;
    }

}
