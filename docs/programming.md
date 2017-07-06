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

Пример вызова виджета

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-news',
    'label'     => 'Новости компании',
    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/home-news',
]); ?>
```

Пример шаблона ``@app/views/widgets/ContentElementsCmsWidget/home-news``

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


[Смотреть видео](https://youtu.be/lDom8RvIqzo)



## Корзина в шапке + добавление товаров в корзину

Корзина в шапке сайта

Вызов

```php
<?= \skeeks\cms\shop\widgets\cart\ShopCartWidget::widget([
    'namespace' => 'ShopCartWidget-small-top',
    'viewFile' => '@app/views/widgets/ShopCartWidget/small-top'
]); ?>
```
Содержимое шаблона ``@app/views/widgets/ShopCartWidget/small-top``

```php
<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\shop\widgets\cart\ShopCartWidget */
\frontend\assets\CartAsset::register($this);
$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        new sx.classes.shop.SmallCart(sx.Shop, 'sx-cart', {
            'delay': 500
        });
    })(sx, sx.$, sx._);
JS
);
?>
<? \skeeks\cms\widgets\Pjax::begin([
    'id' => 'sx-cart'
]); ?>
    <div class="text">
        <span>Товаров:<a href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" data-pjax="0"><?= \Yii::$app->shop->shopFuser->countShopBaskets; ?> шт.</a></span>
        <span>На<a href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" data-pjax="0"><?= \Yii::$app->money->convertAndFormat(\Yii::$app->shop->shopFuser->money); ?></a></span>
        <a class="btn btn-orange" href="<?= \yii\helpers\Url::to(['/shop/cart']); ?>" data-pjax="0">Оформить заказ</a>
    </div>
<? \skeeks\cms\widgets\Pjax::end(); ?>
```

Добавление товара в корзину

Отрисовка соответствующей кнопки уведомить или добавить в корзину
```php

<? if ($shopProduct->quantity > 0) : ?>
    <?= \yii\helpers\Html::tag('a', 'Купить', [
      'class' => 'js-to-cart sx-to-cart btn btn-buy',
      'type' => 'button',
      'onclick' => new \yii\web\JsExpression("sx.Shop.addProduct({$shopProduct->id}, 1); return false;"),
      'data' => \yii\helpers\ArrayHelper::merge($model->toArray(['name', 'id']), [
          'url' => $model->url,
          'image' => \skeeks\cms\helpers\Image::getSrc($model->image ? $model->image->src : null),
          'price' => \Yii::$app->money->convertAndFormat($shopProduct->minProductPrice->money),
      ]),
    ]); ?>
<? else : ?>
    <?= \skeeks\cms\shop\widgets\notice\NotifyProductEmailModalWidget::widget([
        'product_id' => $model->id,
        'success_modal_id' => 'readyNotifyEmail',
        'header' => 'Уведомить о поступлении',
        'closeButton' =>
        [
            'tag'   => 'button',
            'class' => 'modal-close btn-circle fill',
            'label' => '<i class="fa fa-remove"></i>',
        ],
        'toggleButton' => [
            'label' => 'Уведомить',
            'style' => '',
            'class' => 'subscribe btn btn-buy',
        ],
    ]); ?>

<? endif; ?>

```

Добавление эффекта при добавлении в корзину

```javascript
$('.sx-to-cart').on('click', function()
{
    UIkit.modal("#sx-toCartModal").show();
});
```


[Смотреть видео](https://youtu.be/AuldDehNXuQ)


## Страница товаров + фильтры

Конструирование виджета фильтров

```php
$shopFilters = new \skeeks\cms\shop\cmsWidgets\filters\ShopProductFiltersWidget([
    'namespace' => 'ShopProductFiltersWidget-left1',
    'onlyExistsFilters' => true,
    'viewFile' => 'slider',
]);

$shopFilters->realatedProperties = \yii\helpers\ArrayHelper::map(
    \skeeks\cms\models\CmsContentProperty::find()
        ->andWhere(['!=', 'property_type', \skeeks\cms\relatedProperties\PropertyType::CODE_STRING])
        ->all(), 'code', 'code'
);
```

```php
<? $filters = new \common\models\ProductFilters(); ?>
<? $filters->load(\Yii::$app->request->get()); ?>

<? $widgetElements = new \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget([
    'namespace' => 'products-second',
    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products',
    'contentElementClass' => \skeeks\cms\shop\models\ShopCmsContentElement::className(),
    'dataProviderCallback' => function (\yii\data\ActiveDataProvider $activeDataProvider)
    use ($filters, $shopFilters)
    {
        $activeDataProvider->query->with('relatedProperties');
        $activeDataProvider->query->with('shopProduct');
        $activeDataProvider->query->with('shopProduct.baseProductPrice');
        $activeDataProvider->query->with('shopProduct.minProductPrice');

        $shopFilters->search($activeDataProvider);
        $filters->search($activeDataProvider);

        //$activeDataProvider->query->joinWith('shopProduct.baseProductPrice as basePrice');
        //$activeDataProvider->query->orderBy(['basePrice' => SORT_ASC]);
    },
]); ?>

<?
$widgetElementsContent = $widgetElements->run();
$shopFiltersContent = $shopFilters->run();
?>
```

[Смотреть видео](https://youtu.be/fTr9jGpN9Nk)

## Страница одного товара

Виджет поделиться в соц. сетях

```php
<?= \skeeks\cms\yandex\share\widget\YaShareWidget::widget([
    'namespace' => 'YaShareWidget-main'
]); ?>
```


Виджет отзывы

```php
<?= \skeeks\cms\reviews2\widgets\reviews2\Reviews2Widget::widget([
    'namespace' => 'Reviews2Widget',
    'viewFile' => '@app/views/widgets/Reviews2Widget/package',
    'cmsContentElement' => $model
]); ?>
```

Необходимые данные по товару

```php
$shopProduct = \skeeks\cms\shop\models\ShopProduct::getInstanceByContentElement($model);
$shopCmsContentElement = new \v3toys\skeeks\models\V3toysProductContentElement($model->toArray());

$shopProduct->quantity;

<dd>Артикул: <?= $shopCmsContentElement->v3toysProductProperty->sku; ?></dd>
<dd>Код товара: <?= $shopCmsContentElement->v3toysProductProperty->v3toys_id; ?></dd>
```

Похожие товары

```php
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'productpage-same-products',
    'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products-same',
    'label'  =>  'Похожие товары',
    'options'  =>  [
        'class' => 'xd_gallery_third',
        'navigateId' => 'cb_best_checkout_products_for_product_third'
    ],
    'contentElementClass' => \skeeks\cms\shop\models\ShopCmsContentElement::className(),
    'dataProviderCallback' => function (\yii\data\ActiveDataProvider $activeDataProvider) use ($model)
    {
        $activeDataProvider->query->with('relatedProperties');
        $activeDataProvider->query->with('shopProduct');
        $activeDataProvider->query->with('shopProduct.baseProductPrice');
        $activeDataProvider->query->with('shopProduct.minProductPrice');


        $query = $activeDataProvider->query;

        $query->andWhere(['cms_content_element.tree_id'     => $model->tree_id]);

        /*$query
            ->joinWith('relatedElementProperties map')
            ->joinWith('relatedElementProperties.property property')

            ->andWhere(['property.code'     => 'brand'])
            ->andWhere(['map.value'         => $model->relatedPropertiesModel->getAttribute('brand')])
        ;*/

        $filters = new \common\models\ProductFilters([]);
        $filters->search($activeDataProvider);

    },
  ]); ?>
```
[Смотреть видео](https://youtu.be/BYZueqGQl5g)


## Определение местоположения + виджет выбора



* Получить токен https://dadata.ru/
* Указать этот токен в настройках компонента в системе управления сайтом

Пример запуска виджета:

```php
<?= \skeeks\cms\dadataSuggest\widgets\address\DadataGetAddressWidget::widget([
    'options' =>
    [
        'href' => '#',
        'onclick' => 'new sx.classes.ModalRegionPageReload(); return false;',
        'class' => 'sx-dadata-suggestion-city',
    ]
]); ?>
```

[Смотреть видео](https://youtu.be/UH4dyTvqdaA)


## Отзывы на главной странице

```php
<?
  /**
   * @var \skeeks\cms\reviews2\models\Reviews2Message $review
   */
  ?>
  <? if ($reviews = \skeeks\cms\reviews2\models\Reviews2Message::find()->limit(5)->all()) : ?>
      <div class="review">
          <h5>Отзывы:</h5>
          <div class="review__posts">
          <? foreach ($reviews as $review) : ?>
              <div class="review__post">
                  <span class="author"><?= $review->createdBy ? $review->createdBy->displayName : $review->user_name; ?></span><span>
                      <a href="<?= $review->element->url; ?>"><?= $review->comments; ?></a>
                  </span><br>
                  <select class="stars">
                    <option value="1" <?= $review->rating == 1 ? "selected" : ""; ?>>1</option>
                    <option value="2" <?= $review->rating == 2 ? "selected" : ""; ?>>2</option>
                    <option value="3" <?= $review->rating == 3 ? "selected" : ""; ?>>3</option>
                    <option value="4" <?= $review->rating == 4 ? "selected" : ""; ?>>4</option>
                    <option value="5" <?= $review->rating == 5 ? "selected" : ""; ?>>5</option>
                  </select>
                </div>
          <? endforeach; ?>
          </div>
      </div>
  <? endif; ?>
```

[Смотреть видео](https://youtu.be/fnnAIJDfS5Y)


## Поиск по сайту

Поисковая форма

```php
<form class="site-search search" action="/search" method="get">
    <input type="text" class="uk-input" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>" value="<?= \Yii::$app->cmsSearch->searchQuery; ?>" placeholder="Искать товар..."/>
    <button class="btn btn-grey">Поиск</button>
</form>
```

Шаблон ``@app/views/modules/cmsSearch/result/index``

```php
<? \skeeks\cms\modules\admin\widgets\Pjax::begin(); ?>
    <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
        'namespace' => 'ContentElementsCmsWidget-search-result',
        'viewFile' => '@app/views/widgets/ContentElementsCmsWidget/products',
        'enabledCurrentTree' => \skeeks\cms\components\Cms::BOOL_N,
        'active' => "Y",
        'dataProviderCallback' => function (\yii\data\ActiveDataProvider $dataProvider) {
            \Yii::$app->cmsSearch->buildElementsQuery($dataProvider->query);
            \Yii::$app->cmsSearch->logResult($dataProvider);
        },
    ]) ?>
<? \skeeks\cms\modules\admin\widgets\Pjax::end(); ?>
```

[Смотреть видео](https://youtu.be/L4_GVzXh0pY)