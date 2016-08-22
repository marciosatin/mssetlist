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
        $setlistEntity = new SetlistEntity();
        $setlistEntity->setStNome($stNome);

        $this->em->persist($setlistEntity);
        $this->em->flush();

        return $setlistEntity;
    }
    
    public function update(array $data) {
        $setlistEntity = $this->em
                ->getReference('Application\Entity\Setlist', $data['cdSetlist']);
        $setlistEntity->setStNome($data['stNome']);

        $this->em->persist($setlistEntity);
        $this->em->flush();
        
        return $setlistEntity;
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
