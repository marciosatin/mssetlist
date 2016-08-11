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
            'stLinkC' => (string) $data['stLinkC'],
            'stLinkV' => (string) $data['stLinkV'],
            'stTom' => (string) $data['stTom'],
            'stTempoDuracao' => $data['stTempoDuracao']
        );

        $generoEntity = $this->em
                ->getReference('Application\Entity\Genero', (int) $data['cdGenero']);

        $artistaEntity = $this->em
                ->getReference('Application\Entity\Artista', (int) $data['cdArtista']);


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
        return $musicaArtistaEntity;
    }
    
    public function update(MusicaEntity $musica, array $data) {
        $musicaArtistaEntity = $this->em
                ->getReference('Application\Entity\MusicaArtista', $data['cdMusicaArtista']);
        $musicaArtistaEntity->setMusica($musica);

        if (isset($data['generoId'])) {
            $generoEntity = $this->em
                ->getReference('Application\Entity\Genero', $data['generoId']);
            $musicaArtistaEntity->setGenero($generoEntity);
        }

        if (isset($data['artistaId'])) {
            $artistaEntity = $this->em
                    ->getReference('Application\Entity\Artista', $data['artistaId']);
            $musicaArtistaEntity->setArtista($artistaEntity);
        }

        $musicaArtistaEntity->setStLinkCifra($data['stLinkC']);
        $musicaArtistaEntity->setStLinkVideo($data['stLinkV']);
        $musicaArtistaEntity->setStTom($data['stTom']);
        $musicaArtistaEntity->setStTempoDuracao($data['stTempoDuracao']);

        $this->em->persist($musicaArtistaEntity);
        $this->em->flush();
        
        return $musicaArtistaEntity;
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
