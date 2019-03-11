<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
$config = [
    'components' => [
        'urlManager' => [
            'rules' => [
                'search' => 'cmsSearch/result',
                [
                    'class'  => \skeeks\cms\components\urlRules\UrlRuleContentElement::class,
                    'suffix' => '/',
                ],
                [
                    'class'  => \skeeks\cms\components\urlRules\UrlRuleTree::class,
                    'suffix' => '/',
                ],
            ],
        ],

        'themeSettings' => [
            'class' => \v3project\themes\mega\ThemeSettings::class,
        ],

        'money' => [
            'class' => 'common\components\CommonMoney',
        ],
    ],
];


return $config;
