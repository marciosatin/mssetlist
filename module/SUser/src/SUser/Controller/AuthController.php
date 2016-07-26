<?php

namespace SUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\View\Model\JsonModel;

class AuthController extends AbstractActionController{
    public function indexAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            
            $auth = new AuthenticationService();
            $sessionStorage = new SessionStorage();
            $auth->setStorage($sessionStorage);
            
            $authAdapter = $this->getServiceLocator()->get('SUser\Auth\DoctrineAdapter');
            $authAdapter->setUsername($data['username'])
                    ->setPassword($data['password']);
            
            $result = $auth->authenticate($authAdapter);
            if ($result) {
                $sessionStorage->write($auth->getIdentity()['user'], null);
                return new JsonModel(array('success' => true));
            } else {
                return new JsonModel(array('success' => false));
            }
        }
        return new JsonModel(array('success' => false));
    }
}
