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

[Смотреть видео](https://youtu.be/DXyqOk-A6q8)


## Слайдер

Создать контент — слайды
В место слайдера вставить виджет:

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-slides',
    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/slides',
]); ?>
```

[Смотреть видео](https://youtu.be/YZQ0EXnF3y8)

## Блок "новости"

Создать контент — новости
Создать раздел новости
Настроить главный раздел для новостей (соответствующий новости)
В место слайдера вставить виджет:

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-news',
    'label'     => 'Новости компании',
    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/home-news',
]); ?>
```

[Смотреть видео](https://youtu.be/fmsvJ7QJpjA)


## Текстовый раздел + хлебные крошки


Привести шаблон к виду шаблона исходной верстки ``\frontend\templates\default\modules\cms\tree\text.php``

Виджет хлебных крошек:

```php
<?= \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget::widget([
    'viewFile'       => '@app/views/widgets/BreadcrumbsCmsWidget/default',
]); ?>
```

Шаблон ``@app/views/widgets/BreadcrumbsCmsWidget/default``

```php
<?php
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget */
?>
<? if (\Yii::$app->breadcrumbs->parts) : ?>
    <? $count = count(\Yii::$app->breadcrumbs->parts); ?>
    <? $counter = 0; ?>
    <? if ($count > 1) : ?>
        <ul class="breadcrumb">
            <? foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
                <? $counter ++; ?>
                <? if ($counter == $count): ?>
                    <li class="active"><?= $data['name']; ?></li>
                <? else : ?>
                    <li><a href="<?= $data['url']; ?>" title="<?= $data['name']; ?>"><?= $data['name']; ?></a></li>
                <? endif;?>
            <? endforeach; ?>
        </ul>
    <? endif;?>
<? endif;?>
```


[Смотреть видео](https://youtu.be/cp7Fdo9-xPs)



## Страница контакты (кастомные страницы)

Для того чтобы создать страницу в необычном шаблоне. 
Необходимо создать раздел в дереве разделов, и назначить ему собственный шаблон.


[Смотреть видео](https://youtu.be/am7FfTj7E6A)


## Конструктор форм (обратная связь, заказать звонок)

### Пример вызова формы

```php
<?= \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::widget([
    'namespace' => 'phone',
    'form_code' => 'callback',
    'viewFile' => 'with-messages'
]); ?>
```

### Пример альтернативного вызова формы

```php
<? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::beginWidget('phone', [
    'form_code' => 'callback',
    'viewFile' => 'with-messages'
]); ?>
<? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::end(); ?>
```
### Пример в модальном окне bootstrap + js success callback

```php
<? $modal = \yii\bootstrap\Modal::begin([
    'header' => 'Заказать звонок',
    'toggleButton' => [
        'label' => '<i class="fa fa-phone"></i> Заказать звонок',
        'class' => 'call-me btn btn-lg btn-blue hidden-xs',
    ],
]); ?>
    <? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::beginWidget('phone', [
        'form_code' => 'callback',
        'viewFile' => 'with-messages',
        'successJs' => <<<JS
function(jForm, data)
{
_.delay(function()
{
$("#{$modal->id}").modal('hide');
}, 1500);

}
JS
,
    ]); ?>
    <? \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::end(); ?>
<? \yii\bootstrap\Modal::end(); ?>
```


[Смотреть видео](https://youtu.be/3NvoEKz51ss)


## Авторазиция / Регистрация

Примеры в официальной документации [https://docs.cms.skeeks.com/ru/latest/quickstart.html#id9](https://docs.cms.skeeks.com/ru/latest/quickstart.html#id9)

[Смотреть видео](https://youtu.be/VeY2PJcCc38)


## Вывод товаров на главную страницу

### Пример вызова виджета

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-news',
    'label'     => 'Новости компании',
    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/home-news',
]); ?>
```

### Пример шаблона ``@app/views/widgets/ContentElementsCmsWidget/home-news``

```php
<?php
/**
 * @var \skeeks\cms\models\CmsContentElement $model
 */
$shopProduct = \skeeks\cms\shop\models\ShopProduct::getInstanceByContentElement($model);
$additional = $model->relatedPropertiesModel->getEnumByAttribute('additional');
?>

<div class="col col-4">
  <div class="catalog__item">
    <div class="tag <?= $additional ? $additional->code : ""; ?>"></div>
    <div class="img">
        <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" data-pjax="0">
        <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
         new \skeeks\cms\components\imaging\filters\Thumbnail([
             'w' => 0,
             'h' => 200,
         ]), $model->code
     ) ?>" alt="<?= $model->name; ?>">
        </a>
    </div>

      <? if ($ageFrom = $model->relatedPropertiesModel->getAttribute('ageFrom')) : ?>
          <div class="age-limit">
            <span><?= $ageFrom; ?>+</span>
        </div>
      <? endif; ?>


    <h2><?= $model->name; ?></h2>
    <div class="excerpt"><?= $model->description_short; ?></div>
    <div class="buy">
      <div class="row">
        <div class="col col-6">
          <div class="price">
              <? if ($shopProduct->minProductPrice->id == $shopProduct->baseProductPrice->id) : ?>
                <?= \Yii::$app->money->convertAndFormat($shopProduct->minProductPrice->money); ?>
            <? else : ?>
                <span
                    class="line-through"><?= \Yii::$app->money->convertAndFormat($shopProduct->baseProductPrice->money); ?></span>
                <span
                    class="sx-discount-price"><?= \Yii::$app->money->convertAndFormat($shopProduct->minProductPrice->money); ?></span>
            <? endif; ?>
          </div>
        </div>
        <div class="col col-6">
          <div class="button"><a class="btn btn-buy" href="#" onclick="sx.Shop.addProduct(<?= $shopProduct->id;  ?>, 1); return false;">Купить</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
```