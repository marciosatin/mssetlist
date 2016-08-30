<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Application\Service\Musica' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $musicaService = new \Application\Service\Musica($em);
                    return $musicaService;
                },
                'Application\Service\MusicaArtista' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $musicaArtistaService = new \Application\Service\MusicaArtista($em);
                    return $musicaArtistaService;
                },
                'Application\Service\Artista' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $artistaService = new \Application\Service\Artista($em);
                    return $artistaService;
                },
                'Application\Service\Setlist' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $setListService = new \Application\Service\Setlist($em);
                    return $setListService;
                },
                'Application\Service\SetlistItem' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $setListItemService = new \Application\Service\SetlistItem($em);
                    return $setListItemService;
                },
                'Application\Service\Genero' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $generoService = new \Application\Service\Genero($em);
                    return $generoService;
                }
            )
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
