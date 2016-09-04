<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class MusicaController extends AbstractRestfulController
{

    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\MusicaArtista')->findAll();
        return $data;
    }

    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\MusicaArtista')->find($id);
        return $data;
    }

    public function create($data)
    {
        $serviceMusica = $this->getServiceLocator()->get('Application\Service\Musica');
        $nome = (string) $data['stNome'];

        $musica = $serviceMusica->insert($nome);

        $serviceMusicaArtista = $this->getServiceLocator()->get('Application\Service\MusicaArtista');
        $musicaArtista = $serviceMusicaArtista->insert($musica, $data);

        return ($musicaArtista) ? $musicaArtista : array('success' => false);
    }

    public function update($cdMusica, $data)
    {
        $serviceMusica = $this->getServiceLocator()->get('Application\Service\Musica');
        
        $param['cdMusica'] = (int) $data['musica']['cd_musica'];
        $param['stNome'] = (string) $data['musica']['st_nome'];

        $musica = $serviceMusica->update($param);
        
        $dataUpdate = array(
            'cdMusicaArtista' => (int) $cdMusica,
            'stLinkV' => isset($data['st_link_video']) ? (string) $data['st_link_video'] : null,
            'stLinkC' => isset($data['st_link_cifra']) ? (string) $data['st_link_cifra'] : null,
            'stTempoDuracao' => isset($data['st_tempo_duracao']) ? $data['st_tempo_duracao'] : null,
            'stTom' => isset($data['st_tom']) ? (string) $data['st_tom'] : null,
        );

        if (isset($data['artistaId'])) {
            $dataUpdate['artistaId'] = (int) $data['artistaId'];
        }

        if (isset($data['generoId'])) {
            $dataUpdate['generoId'] = (int) $data['generoId'];
        }

        $serviceMusicaArtista = $this->getServiceLocator()->get('Application\Service\MusicaArtista');
        $musicaArtista = $serviceMusicaArtista->update($musica, $dataUpdate);

        return ($musicaArtista) ? $musicaArtista : array('success' => false);
    }

    public function delete($cdMusica)
    {
        $serviceMusica = $this->getServiceLocator()->get('Application\Service\Musica');
        $cdMusica = $serviceMusica->delete($cdMusica);
        return ($cdMusica) ? $cdMusica : array('success' => false);
    }

}
