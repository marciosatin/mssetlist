<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class SetlistitemController extends AbstractRestfulController
{

    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\SetlistItem')->findAll();
        return $data;
    }

    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\SetlistItem')->findBy(
                array('cdSetlist' => $id), array('ordem' => 'ASC')
        );
        return $data;
    }

    public function create($data)
    {
        $cdSetlist = $this->params()->fromRoute('id');
        $serviceSetlistItem = $this->getServiceLocator()->get('Application\Service\SetlistItem');
        $setlistItem = $serviceSetlistItem->insert($cdSetlist, $data);
        return ($setlistItem) ? $setlistItem : array('success' => false);
    }

    public function update($cdSetlist, $data)
    {
        $serviceSetlist = $this->getServiceLocator()->get('Application\Service\SetlistItem');

        $param['cdSetlist'] = (int) $cdSetlist;
        $param['itens'] = $data;

        $setlist = $serviceSetlist->update($param);
        return ($setlist) ? $setlist : array('success' => false);
    }

    public function delete($cdSetlistItem)
    {
        $serviceSetlist = $this->getServiceLocator()->get('Application\Service\SetlistItem');
        $cdSetlistItem = $serviceSetlist->delete($cdSetlistItem);
        return ($cdSetlistItem) ? $cdSetlistItem : array('success' => false);
    }

}
