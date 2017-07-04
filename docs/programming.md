## Верхнее и нижнее меню сайта

[Документация по виджету](https://docs.cms.skeeks.com/en/latest/quickstart.html#skeeks-cms-cmswidgets-treemenu-treemenucmswidget)

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

[Смотреть видео](https://youtu.be/N8jXegwP6O0)


## Вложенное меню каталога

[Документация по виджету](https://docs.cms.skeeks.com/en/latest/quickstart.html#skeeks-cms-cmswidgets-treemenu-treemenucmswidget)

 * Поставить виджет в шаблон где необходимо меню
```php
<?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace' => 'catalog-menu',
    'viewFile' => '@app/views/widgets/TreeMenuCmsWidget/catalog-menu',
    //'label' => 'Title menu',
    //'level' => 1,
    //'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
]); ?>
```

* Содержимое шаблона ``@app/views/widgets/TreeMenuCmsWidget/catalog-menu``

```php
<?php
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $trees  \skeeks\cms\models\Tree[] */
?>
<ul class="menu">
    <? if ($trees = $widget->activeQuery->all()) : ?>
        <? foreach ($trees as $tree) : ?>
            <li class="menu__item">
                <a href="<?= $tree->url; ?>" title="<?= $tree->name; ?>"><?= $tree->name; ?></a>
                <? if ($tree->children) : ?>
                     <ul class="sub-menu">
                         <? foreach ($tree->children as $childTree) : ?>
                             <li class="sub-menu__item">
                                 <a href="<?= $childTree->url; ?>" title="<?= $childTree->name; ?>"><?= $childTree->name; ?></a>
                             </li>
                         <? endforeach; ?>
                      </ul>
                <? endif; ?>
            </li>
        <? endforeach; ?>
    <? endif; ?>
</ul>
```

[Смотреть видео](https://youtu.be/YLLs3bQ8yO0)


## Редкатируемые области

[Документация по виджету](https://docs.cms.skeeks.com/en/latest/quickstart.html#skeeks-cms-cmswidgets-text-textcmswidget)

Для управления блоками текста на сайте, в шапке и в футере
```php
<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('home-text'); ?>
  <h1>Добро пожаловать!</h1>
<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
```

[Смотреть видео](https://youtu.be/YLLs3bQ8yO0)