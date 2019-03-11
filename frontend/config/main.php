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
        ],
        'view' => [
            'theme' => [
                'class' => \v3project\themes\mega\ThemeMega::class,
                'logo' => 'https://hsto.org/getpro/moikrug/uploads/company/100/005/586/5/logo/medium_fbc7e6e2f923f4923190c74711adb75c.png',
            ],
        ],
    ],
];
return $config;
