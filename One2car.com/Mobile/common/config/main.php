<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'fhub' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '../../common/messages',
                    // 'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'fhub' => 'fhub.php',
                    ],
                ],
            ],
        ],
    ],
    'language' => 'en',
];
