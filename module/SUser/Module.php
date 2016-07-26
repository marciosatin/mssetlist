<?php

namespace SUser;

class Module {
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'SUser\Auth\DoctrineAdapter' => function($sm) {
                    return Auth\DoctrineAdapter($sm->get('Doctrine\ORM\EntityManager'));
                } 
            )
        );
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
    
    public function getConfig() {
        return include __DIR__.'/config/module.config.php';
    }
    
}
