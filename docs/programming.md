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

#### [Смотреть видео](https://youtu.be/N8jXegwP6O0)


## Программирование вложенного меню каталога

