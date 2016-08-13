<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Setlist as SetlistEntity;

class Setlist
{
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert($stNome)
    {
        $artistaEntity = new SetlistEntity();
        $artistaEntity->setStNome($stNome);

        $this->em->persist($artistaEntity);
        $this->em->flush();

        return $artistaEntity;
    }
    
    public function update(array $data) {
        $artistaEntity = $this->em
                ->getReference('Application\Entity\Setlist', $data['cdSetlist']);
        $artistaEntity->setNome($data['stNome']);

        $this->em->persist($artistaEntity);
        $this->em->flush();
        
        return $artistaEntity;
    }
    
    public function delete($cdSetlist)
    {
        $artistaEntity = $this->em
                ->getReference('Application\Entity\Setlist', $cdSetlist);

        $this->em->remove($artistaEntity);
        $this->em->flush();
        
        return $cdSetlist;
    }

}
