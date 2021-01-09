<?php

use yii\rest\UrlRule;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log', 'gii'],
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module'
        ]
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
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/codigosbarras',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/produto',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' => false,
                    'only' => ['login'],
                    'extraPatterns' => ['POST login' => 'login',]
                ],
                [
                    'class' => UrlRule::class,
                    'controller' => ['api/itensdespensa'],
                    'pluralize' => false,
                    'extraPatterns' => ['GET despensa/<apikey:\w+>' => 'despensa', 'POST adicionaritem' => 'adicionaritem', 'GET count/<apikey:\w+>' => 'count'],
                ],
                [
                    'class' => UrlRule::class,
                    'controller' => ['api/ingredientes'],
                    'pluralize' => false,
                    'extraPatterns' =>
                        [
                            'GET containingredientes/<apikey:\w+>' => 'containingredientes',
                            'GET receitadispo/<apikey:\w+>' => 'receitadispo',
                            'GET ingredientesemfalta/<apikey:\w+>' => 'ingredientesemfalta'
                        ],
                ],
                [
                    'class' => UrlRule::class,
                    'controller' => 'api/receitas',
                    'pluralize' => false,
                ],
                [
                    'class' => UrlRule::class,
                    'controller' => 'api/feedback',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET utilizador/<apikey:\w+>' => 'utilizador',
                        'GET tipos/<apikey:\w+>' => 'tipos',
                        'GET tiposglobais/<apikey:\w+>' => 'tiposglobais',
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];
