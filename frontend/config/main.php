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
                /*'logo' => 'http://4.bp.blogspot.com/-pybOnS5ISC4/Ts6oFp9r9LI/AAAAAAAABMM/4gCTGO3OCcA/s1600/DOROT%25C3%2589IA.png',
                'favicon' => 'http://4.bp.blogspot.com/-pybOnS5ISC4/Ts6oFp9r9LI/AAAAAAAABMM/4gCTGO3OCcA/s1600/DOROT%25C3%2589IA.png',
                'title' => 'Куклы ТУТ',
                'h1_title' => 'Интернет-магазин "Куклы ТУТ"',
                'site_nav_color' => '#e06993',
                'btn_color' => '#e06993',
                'a_color' => '#e06993',
                'bg_image' => 'https://sorokavorona.com.ua/4293-fullwidth_product/kukla-alina-govorit-poet-pesnyu-rost-kukly-26-sm-4-vida.jpg',*/
            ],
        ],
    ],
];
return $config;
