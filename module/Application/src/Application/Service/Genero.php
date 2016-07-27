<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Genero as GeneroEntity;

class Genero
{
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert($stNome)
    {
        $generoEntity = new GeneroEntity();
        $generoEntity->setStNome($stNome);

        $this->em->persist($generoEntity);
        $this->em->flush();

        return $generoEntity;
    }
    
    public function update(array $data) {
        $generoEntity = $this->em
                ->getReference('Application\Entity\Genero', $data['cdGenero']);
        $generoEntity->setNome($data['stNome']);

        $this->em->persist($generoEntity);
        $this->em->flush();
        
        return $generoEntity;
    }
    
    public function delete($cdGenero)
    {
        $generoEntity = $this->em
                ->getReference('Application\Entity\Genero', $cdGenero);

        $this->em->remove($generoEntity);
        $this->em->flush();
        
        return $cdGenero;
    }

}
