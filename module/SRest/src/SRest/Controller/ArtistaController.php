<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class ArtistaController extends AbstractRestfulController
{

    public function getList() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Artista')->findBy(array(), array(
            'stNome' => 'ASC'
        ));
        return $data;
    }

    public function get($id) {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Artista')->find($id);
        return $data;
    }

    public function create($data) {
        $serviceArtista = $this->getServiceLocator()->get('Application\Service\Artista');
        $nome = $data['stNome'];

        $artista = $serviceArtista->insert($nome);
        return ($artista) ? $artista : array('success' => false);
    }

    public function update($cdArtista, $data)
    {
        $serviceArtista = $this->getServiceLocator()->get('Application\Service\Artista');

        $param['cdArtista'] = $cdArtista;
        $param['stNome'] = $data['stNome'];

        $artista = $serviceArtista->update($param);
        return ($artista) ? $artista : array('success' => false);
    }

    public function delete($cdArtista)
    {
        $serviceArtista = $this->getServiceLocator()->get('Application\Service\Artista');
        $cdArtista = $serviceArtista->delete($cdArtista);
        return ($cdArtista) ? $cdArtista : array('success' => false);
    }

}
