<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class MusicaController extends AbstractRestfulController
{

    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\MusicaArtista')->findAll();

//        die('<pre>' . var_dump($data) . " File: " . __FILE__ . " Linha: " . __LINE__ . '</pre>');

        return $data;
    }

    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Musica')->find($id);
        return $data;
    }

    public function create($data)
    {
        $serviceMusica = $this->getServiceLocator()->get('Application\Service\Musica');
        $nome = $data['stNome'];

        $musica = $serviceMusica->insert($nome);

        $serviceMusicaArtista = $this->getServiceLocator()->get('Application\Service\MusicaArtista');
        $musicaArtista = $serviceMusicaArtista->insert($musica, $data);

        return ($musicaArtista) ? $musicaArtista : array('success' => false);
    }

    public function update($cdMusica, $data)
    {
        $serviceMusica = $this->getServiceLocator()->get('Application\Service\Musica');

        $param['cdMusica'] = $cdMusica;
        $param['stNome'] = $data['stNome'];

        $musica = $serviceMusica->update($param);
        return ($musica) ? $musica : array('success' => false);
    }

    public function delete($cdMusica)
    {
        $serviceMusica = $this->getServiceLocator()->get('Application\Service\Musica');
        $cdMusica = $serviceMusica->delete($cdMusica);
        return ($cdMusica) ? $cdMusica : array('success' => false);
    }

}
