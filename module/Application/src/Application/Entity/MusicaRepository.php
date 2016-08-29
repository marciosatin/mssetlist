<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

class MusicaRepository extends EntityRepository
{

    public function buscarPorNome($searchterm)
    {
        return $this->_em->createQuery("SELECT m FROM  Application\Entity\Musica m WHERE m.stNome like :searchterm")
                        ->setParameter('searchterm', '%' . $searchterm . '%')
                        ->getResult();
    }

}
