# SkeekS CMS проект с интеграцией v3project

## Материалы для ознакомления

 * [https://cms.skeeks.com/](https://cms.skeeks.com/) - официальный сайт SkeekS CMS
 * [http://www.yiiframework.com/](http://www.yiiframework.com/) - официальный сайт Yii2 фреймоврка
 * [https://github.com/v3project/skeeks](https://github.com/v3project/skeeks) - официальный модуль интеграции с v3project
 * [https://docs.cms.skeeks.com/en/latest/](https://docs.cms.skeeks.com/en/latest/) - документация по SkeekS CMS
 * [https://github.com/v3project/app-v3-shop](https://github.com/v3project/app-v3-shop) - официальный базовый проект на SkeekS CMS интегрированный с v3project

#### [Смотреть видео](https://youtu.be/sYAdOXiPWrg)

## Установка проекта

```bash
# Download latest version of composer
curl -sS https://getcomposer.org/installer | COMPOSER_HOME=.composer php
# Installing the base project SkeekS CMS
COMPOSER_HOME=.composer php composer.phar create-project --no-install --prefer-dist v3project/app-v3-shop demo.ru
# Going into the project folder
cd demo.ru
# Download latest version of composer in project
curl -sS https://getcomposer.org/installer | COMPOSER_HOME=.composer php
# Extra plug-ins
COMPOSER_HOME=.composer php composer.phar global require fxp/composer-asset-plugin --no-plugins
# Download dependency
COMPOSER_HOME=.composer php composer.phar install -o
# Run the command to initialize the project, the installer executable file and the necessary rights to the directory
php yii cms/init

#Edit the file to access the database, it is located at common/config/db.php

#Installation of ready-dump
php yii dbDumper/mysql/restore
```

[Смотреть видео](https://youtu.be/DpNzH701EWY)

## Подготовительные работы

1. создать git репозиторий

 * https://bitbucket.org
 * https://github.com/
 * https://git.skeeks.com
 
2. Настроить проект в IDE

#### [Смотреть видео](https://youtu.be/7YdqD5ad1lA)

## Начальные работы по привязке шаблона

 * Создать AssetBundle для текущего проекта
 * Перенести html разметку шаблона в ``frontend/templates/default/layouts/main.php``

#### [Смотреть видео](https://youtu.be/zA36nuQz2fg)



## Программирование верхнего и нижнего меню сайта

 * Поставить виджет в шаблон где необходимо меню

```php
<?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace' => 'footer-menu',
    'viewFile' => '@app/views/widgets/TreeMenuCmsWidget/menu-top',
    //'label' => 'Title menu',
    'level' => 1,
    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
]); ?>
```

 * Содержимое шаблона ``@app/views/widgets/TreeMenuCmsWidget/menu-top``

```php
<?php
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $trees  \skeeks\cms\models\Tree[] */
?>
<ul>
    <? if ($trees = $widget->activeQuery->all()) : ?>
        <? foreach ($trees as $tree) : ?>
            <li><a href="<?= $tree->url; ?>" title="<?= $tree->name; ?>"><?= $tree->name; ?></a></li>
        <? endforeach; ?>
    <? endif; ?>
</ul>
```

#### [Смотреть видео](https://youtu.be/zA36nuQz2fg)