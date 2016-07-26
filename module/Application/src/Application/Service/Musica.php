<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Musica as MusicaEntity;

class Musica
{

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert($stNome)
    {
        $musicaEntity = new MusicaEntity();
        $musicaEntity->setStNome($stNome);

        $this->em->persist($musicaEntity);
        $this->em->flush();

        return $musicaEntity;
    }
    
    public function update(array $data) {
        $musicaEntity = $this->em
                ->getReference('Application\Entity\Musica', $data['cdMusica']);
        $musicaEntity->setNome($data['stNome']);

        $this->em->persist($musicaEntity);
        $this->em->flush();
        
        return $musicaEntity;
    }
    
    public function delete($cdMusica)
    {
        $musicaEntity = $this->em
                ->getReference('Application\Entity\Musica', $cdMusica);

        $this->em->remove($musicaEntity);
        $this->em->flush();
        
        return $cdMusica;
    }

}
