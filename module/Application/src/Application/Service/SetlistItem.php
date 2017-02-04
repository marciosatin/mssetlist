<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\SetlistItem as SetlistItemEntity;

class SetlistItem
{

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function insert($cdSetlist, array $data)
    {
        if ($data) {
            for ($i = 0, $iM = count($data); $i < $iM; $i++) {

                $dataInsert = array(
                    'cdMusicaArtista' => (int) $data[$i]['cdMusicaArtista'],
                    'cdSetlist' => (int) $cdSetlist,
                );

                $musicaArtistaEntity = $this->em
                        ->getReference('Application\Entity\MusicaArtista', $dataInsert['cdMusicaArtista']);

                $setlistEntity = $this->em
                        ->getReference('Application\Entity\Setlist', $dataInsert['cdSetlist']);

                $setlistItemEntity = new SetlistItemEntity();
                $setlistItemEntity->setCdMusicaArtista($dataInsert['cdMusicaArtista']);
                $setlistItemEntity->setCdSetlist($dataInsert['cdSetlist']);
                $setlistItemEntity->setMusicaartista($musicaArtistaEntity);
                $setlistItemEntity->setSetlist($setlistEntity);

                $this->em->persist($setlistItemEntity);
                $this->em->flush();
            }
        }
        return array('success' => true);
    }

    public function delete($cdSetlistItem)
    {
        $setListItemEntity = $this->em
                ->getReference('Application\Entity\SetlistItem', $cdSetlistItem);

        $this->em->remove($setListItemEntity);
        $this->em->flush();

        return $cdSetlistItem;
    }

}
