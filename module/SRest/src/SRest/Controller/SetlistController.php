<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class SetlistController extends AbstractRestfulController
{

    public function getList() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Setlist')->findAll();
        return $data;
    }

    public function get($id) {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Setlist')->find($id);
        return $data;
    }

    public function create($data) {
        $serviceSetlist = $this->getServiceLocator()->get('Application\Service\Setlist');
        $nome = $data['stNome'];

        $artista = $serviceSetlist->insert($nome);
        return ($artista) ? $artista : array('success' => false);
    }

    public function update($cdSetlist, $data)
    {
        $serviceSetlist = $this->getServiceLocator()->get('Application\Service\Setlist');

        $param['cdSetlist'] = $cdSetlist;
        $param['stNome'] = $data['st_nome'];

        $setlist = $serviceSetlist->update($param);
        return ($setlist) ? $setlist : array('success' => false);
    }

    public function delete($cdSetlist)
    {
        $serviceSetlist = $this->getServiceLocator()->get('Application\Service\Setlist');
        $cdSetlist = $serviceSetlist->delete($cdSetlist);
        return ($cdSetlist) ? $cdSetlist : array('success' => false);
    }

    public function searchAction()
    {
        $q = $this->params()->fromRoute('q');
        $cdSetList = $this->params()->fromRoute('id');

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        try {
            $data = $em->getRepository('Application\Entity\MusicaArtista')->buscarPorNomeSetlistItem($cdSetList, $q);
        } catch (\Exception $exc) {
            return array(
                array(
                    'errorCode' => $exc->getCode(),
                    'errorMessage' => $exc->getMessage()
                )
            );
        }
        return $data;
    }
}
