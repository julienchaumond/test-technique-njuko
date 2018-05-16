<?php

namespace Classement;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Classement\Controller\ClassementControllerFactory;

return [
    'router' => [
        'routes' => [
            'classement' => [
                'type' => Segment::class,
                'options' => [
                    // The classement route takes in first the eventId then the type (general, female, male) and finally the type of sort
                    'route'    => '/classement[/:event_id[/:type[/:sort[/:sortType]]]]',
                    'defaults' => [
                        'controller' => Controller\ClassementController::class,
                        'action'     => 'index',
                    ],
                ],
            ]
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ClassementController::class => ClassementControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../../Application/view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../../Application/view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../../Application/view/error/404.phtml',
            'error/index'             => __DIR__ . '/../../Application/view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ]
];
