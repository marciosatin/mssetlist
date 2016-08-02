<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\MusicaArtista as MusicaArtistaEntity;
use Application\Entity\Musica as MusicaEntity;

class MusicaArtista
{

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert(MusicaEntity $musica, array $data)
    {

        $dataInsert = array(
            'stLinkC' => $data['stLinkC'],
            'stLinkV' => $data['stLinkV'],
            'stTom' => $data['stTom'],
            'stTempoDuracao' => $data['stTempoDuracao']
        );

        $generoEntity = $this->em
                ->getReference('Application\Entity\Genero', $data['cdGenero']);

        $artistaEntity = $this->em
                ->getReference('Application\Entity\Artista', $data['cdArtista']);


        $musicaArtistaEntity = new MusicaArtistaEntity();
        $musicaArtistaEntity->setMusica($musica);
        $musicaArtistaEntity->setArtista($artistaEntity);
        $musicaArtistaEntity->setGenero($generoEntity);
        $musicaArtistaEntity->setStLinkCifra($dataInsert['stLinkC']);
        $musicaArtistaEntity->setStLinkVideo($dataInsert['stLinkV']);
        $musicaArtistaEntity->setStTom($dataInsert['stTom']);
        $musicaArtistaEntity->setStTempoDuracao($dataInsert['stTempoDuracao']);

        $this->em->persist($musicaArtistaEntity);
        $this->em->flush();
        die('<pre>' . print_r('aqui blz', true) . " File: " . __FILE__ . " Linha: " . __LINE__ . '</pre>');

        return $musicaArtistaEntity;
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
