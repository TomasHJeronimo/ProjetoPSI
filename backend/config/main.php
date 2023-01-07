<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Hunting Jobs',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\ModuleAPI',
        ],
    ],
    'components' => [

        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => 'api/user',
                    'extraPatterns' => [
                        'GET count' => 'count',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => 'api/anuncio',
                    'extraPatterns' => [
                        'GET empresa/{id}' => 'empresa',
                        'GET categoria/{id}' => 'categoria',
                        'GET categoria/{nomecategoria}' => 'categorianome',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                        '{nomecategoria}' => '<nomecategoria:\\w+>',
                    ],

                ],

                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/empresa'],

                [
                    'class' => 'yii\rest\UrlRule', 'controller' => 'api/auth',
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'POST novo' => 'novo',
                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
];
