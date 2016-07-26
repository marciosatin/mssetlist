<?php

namespace SUser;

return array(
    'router' => array(
        'routes' => array(
            'suser-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        'controller' => 'SUser\Controller\Auth',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    
    'controllers' => array(
        'invokables' => array(
            'SUser\Controller\Auth' => 'SUser\Controller\AuthController'
        )
    ),
    
    'doctrine' => array(
        'fixture' => array(
            'SUser_fixture' => __DIR__ . '/../src/SUser/Fixture',
        ),
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