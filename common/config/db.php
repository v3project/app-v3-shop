<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (�����)
 * @date 18.09.2015
 */
return [
    'components' => [
        'db' => [
            'class'               => 'yii\db\Connection',
            'dsn'                 => 'mysql:host=localhost;dbname=app-v3-shop',
            'username'            => 'app-v3-shop',
            'password'            => '589brKXRBUGWypAZ',
            'charset'             => 'utf8',
            'enableSchemaCache'   => true,
            'schemaCacheDuration' => 3600,
        ],
    ],
];
