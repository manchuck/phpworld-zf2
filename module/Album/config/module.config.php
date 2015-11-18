<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'controller_plugins' => array(
        'invokables' => array(
            'appHeader' => 'Album\Controller\Plugin\AddAppHeader',
        )
    ),

    'service_manager' => array(
        'invokables' => array(
            'Album\Factory\AlbumTableDelegatorFactory'
        ),
        'factories' => array(
            'Album\Model\AlbumTable' => 'Album\Factory\AlbumTableFactory',
            'AlbumTableGateway'      => 'Album\Factory\AlbumTableGatewayFactory',
        ),
        'delegators' => array(
            'Album\Model\AlbumTable' => array(
                'Album\Factory\AlbumTableDelegatorFactory'
            ),
        ),
    ),

    'view_helpers' => array(
        'invokables' => array(
            'randomquote' => 'Album\View\Helper\RandomQuote'
        )
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);