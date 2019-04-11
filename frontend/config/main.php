<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
$config = [
    'params'           => [],
    'components'       => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'A-1Lng7i0JtS9Lz4T6KFOuwkSbx1yLOP',
            'secureProtocolHeaders' => [
                'X-Forwarded-Proto' => ['https'], // Common
                'Front-End-Https' => ['on'], // Microsoft
                'Cf-Visitor' => ['{"scheme":"https"}'],
            ]
        ],
        'seo' => [
            'canUrl' => [
                //'scheme' => 'https',
//                'host'   => 'orange-fox.com.ru',
            ],
        ],
    ],
];
return $config;
