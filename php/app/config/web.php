<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'task-manager',
    'name' => 'Таск-менеджер',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'K042FAlHEmmoXerrmMe-vbEo3rIR5-8o',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => app\models\User::class,
            'enableAutoLogin' => true,
            'loginUrl' => ['/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''                            => 'site/index',
                'login'                       => 'site/login',
                'signup'                      => 'site/signup',
                'logout'                      => 'site/logout',
                'projects'                    => 'project/index',
                'projects/create'             => 'project/create',
                'projects/<id:\d+>'           => 'project/view',
                'projects/<id:\d+>/update'    => 'project/update',
                'projects/<id:\d+>/delete'    => 'project/delete',
                'tasks'                       => 'task/index',
                'tasks/create'                => 'task/create',
                'tasks/<id:\d+>'              => 'task/view',
                'tasks/<id:\d+>/update'       => 'task/update',
                'tasks/<id:\d+>/delete'       => 'task/delete',
                'tags'                        => 'tag/index',
                'tags/create'                 => 'tag/create',
                'tags/<id:\d+>/update'        => 'tag/update',
                'tags/<id:\d+>/delete'        => 'tag/delete',
                'executors'                   => 'executor/index',
                'executors/create'            => 'executor/create',
                'executors/<id:\d+>/update'   => 'executor/update',
                'executors/<id:\d+>/delete'   => 'executor/delete',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
