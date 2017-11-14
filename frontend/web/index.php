<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010-2014 SkeekS (Sx)
 * @date 19.02.2015
 * @since 1.0.0
 */
//define('YII_ENV',                 'dev');                   //Необязательная константа, если не будет определена, то определение произойдет по ходу выполнения проекта
//define('YII_DEBUG',               true);                    //Необязательная константа, если не будет определена, то определение произойдет по ходу выполнения проекта
//define("VENDOR_DIR",              ROOT_DIR . '/vendor');    //Вендоры

error_reporting(E_ALL);
// определяем режим вывода ошибок
ini_set('display_errors', 'On');

define("ROOT_DIR",              dirname(dirname(__DIR__)));

//Загрузка и запуск web приложения skeeks
$skeeksFile = ROOT_DIR . '/vendor/skeeks/cms/app-web.php';

if (!file_exists($skeeksFile))
{
    //Если нет app-web.php то попробуем начать установку автоматически.
    die("The project is not complete, not installed vendors.");
}

include $skeeksFile;
