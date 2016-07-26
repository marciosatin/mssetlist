<?php

namespace SRest;

use Zend\Mvc\MvcEvent;

class Module {
    
    public function onBootstrap(MvcEvent $e) {
        $sharedEvents = $e->getApplication()->getEventManager()
                ->getSharedManager();
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractRestfulController', 
                MvcEvent::EVENT_DISPATCH, 
                array($this, 'postProcess'), -100);
    }
    
    public function getAutoLoaderConfig() {
        return array(
          'Zend\Loader\StandardAutoLoader' => array(
              'namespaces' => array(
                  __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
              )
          )  
        );
    }
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'SRest\Service\ProcessJson' => function($sm) {
                    $serializer = $sm->get('jms_serializer.serializer');
                    return new \SRest\Service\ProcessJson(null, null, $serializer);
                }
            )
        );
    }
    
    public function getConfig() {
        return include __DIR__.'/config/module.config.php';
    }
    
    public function postProcess(MvcEvent $e) {
        $processJson = $e->getTarget()->getServiceLocator()->get('SRest\Service\ProcessJson');
        $data = $e->getResult();
        $response = new \Zend\Http\Response();
        
        $processJson->setResponse($response);
        $processJson->setData($data);
        
        return $processJson->process();
    }
    
}
