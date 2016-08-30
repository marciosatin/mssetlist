<?php

namespace SUser;

return array(
    'router' => array(
        'routes' => array(
            'rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/:controller[/:action[/:q]][/:id[/]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*',
                        'q' => '.*',
                    )
                )
            )
        )
    ),
    
    'controllers' => array(
        'invokables' => array(
            'musica' => 'SRest\Controller\MusicaController',
            'artista' => 'SRest\Controller\ArtistaController',
            'genero' => 'SRest\Controller\GeneroController',
            'setlist' => 'SRest\Controller\SetlistController',
            'setlistitem' => 'SRest\Controller\SetlistitemController',
        )
    ),
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__.'_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__.'/../src/'.__NAMESPACE__.'/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => __NAMESPACE__.'_driver'
                )
            )
        )
    ),
    
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    )
);