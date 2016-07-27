<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class GeneroController extends AbstractRestfulController
{

    public function getList() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Genero')->findAll();
        return $data;
    }

    public function get($id) {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Genero')->find($id);
        return $data;
    }

    public function create($data) {
        $serviceGenero = $this->getServiceLocator()->get('Application\Service\Genero');
        $nome = $data['stNome'];

        $genero = $serviceGenero->insert($nome);
        return ($genero) ? $genero : array('success' => false);
    }

    public function update($cdGenero, $data)
    {
        $serviceGenero = $this->getServiceLocator()->get('Application\Service\Genero');

        $param['cdGenero'] = $cdGenero;
        $param['stNome'] = $data['stNome'];

        $genero = $serviceGenero->update($param);
        return ($genero) ? $genero : array('success' => false);
    }

    public function delete($cdGenero)
    {
        $serviceGenero = $this->getServiceLocator()->get('Application\Service\Genero');
        $cdGenero = $serviceGenero->delete($cdGenero);
        return ($cdGenero) ? $cdGenero : array('success' => false);
    }

}
