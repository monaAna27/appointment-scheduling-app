<?php

return [
    'login' => [
        'controller' => 'auth',
        'method' => 'login',
    ],

    'register' => [
        'controller' => 'auth',
        'method' => 'register',
    ],

    'login-action' => [
        'controller' => 'auth',
        'method' => 'loginAction',
    ],

    'register-action' => [
        'controller' => 'auth',
        'method' => 'registerAction',
    ],

    'logout' => [
        'controller' => 'auth',
        'method' => 'logoutAction',
    ],

    'index' => [
        'controller' => 'appointment',
        'method' => 'index',
    ],

    'add' => [
        'controller' => 'appointment',
        'method' => 'add',
    ],

    'add-action' => [
        'controller' => 'appointment',
        'method' => 'addAction',
    ],

    'edit' => [
        'controller' => 'appointment',
        'method' => 'edit',
    ],

    'edit-action' => [
        'controller' => 'appointment',
        'method' => 'editAction',
    ],

    'delete-action' => [
        'controller' => 'appointment',
        'method' => 'deleteAction',
    ],

    'finish-action' => [
        'controller' => 'appointment',
        'method' => 'finishAction',
    ],

    'search' => [
        'controller' => 'appointment',
        'method' => 'search',
    ],

    'search-action' => [
        'controller' => 'appointment',
        'method' => 'searchAction',
    ]
];
