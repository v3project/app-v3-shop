<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
//echo "<h1 style='text-align: center; margin-top: 300px;'>На сайте технические работы.<br />Мы работаем над улучшением нашего сервиса.</h1>";die;

define("ROOT_DIR",              dirname(dirname(__DIR__)));

$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "";
//print_r($ip);
if (in_array($ip, [
    '31.148.139.178',
    '95.220.214.90',
    '176.193.252.152',
    '180.249.39.81',
    '94.130.32.131',
    '31.148.139.178',
    '176.193.242.140',
]) && 1 == 1)
{
    defined('YII_ENV') or define('YII_ENV', 'dev');
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('ENV') or define('ENV', 'dev');
}
include ROOT_DIR . '/vendor/skeeks/cms/app-web.php';
