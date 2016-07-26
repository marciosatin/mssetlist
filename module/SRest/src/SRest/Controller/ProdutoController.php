<?php

namespace SRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

class ProdutoController extends AbstractRestfulController {

    public function getList() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->findAll();
        return $data;
    }

    public function get($id) {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->find($id);
        return $data;
    }

    public function create($data) {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        
        $dataInsert = array(
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'categoriaId' => $data['categoriaId']
        );

        $produto = $serviceProduto->insert($dataInsert);
        return ($produto) ? $produto : array('success' => false);
    }

    public function update($id, $data) {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');

        $param['id'] = $id;
        $param['nome'] = $data['nome'];
        $param['descricao'] = $data['descricao'];
        $param['categoriaId'] = $data['categoriaId'];

        $produto = $serviceProduto->update($param);
        return ($produto) ? $produto : array('success' => false);
    }

    public function delete($id) {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $id = $serviceProduto->delete($id);
        return ($id) ? $id : array('success' => false);
    }

}
