<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.10.2015
 */
/* @var $this yii\web\View */
/* @var $model \v3toys\skeeks\models\V3toysOrder */
\skeeks\cms\shop\widgets\ShopGlobalWidget::widget();
?>

<?= \Yii::$app->view->render('@app/views/modules/cms/user/_header', [
    'model' => \Yii::$app->user->identity,
    'title' => 'Мои заказы',
]); ?>

    <header class="title-page">
        <h1>Информация о заказе №<?= $model->id; ?></h1>
    </header>


    <div class="order-info--status">от <?= \Yii::$app->formatter->asDatetime($model->created_at); ?>, <?= $model->v3toys_status_id ? $model->status->name : ""; ?></div>
    <div class="order-info--params">
        <table class="tbl-chars">
            <tr>
                <td><span>Доставка</span></td>
                <td><?= $model->deliveryFullName; ?></td>
            </tr>
            <!--<tr>
                <td><span>Куда доставить</span></td>
                <td><?/*= $model->addre; */?></td>
            </tr>-->
            <tr>
                <td><span>Способ оплаты</span></td>
                <td><?= $model->paymentName; ?></td>
            </tr>
            <tr>
                <td><span>Имя и фамилия</span></td>
                <td><?= $model->name; ?></td>
            </tr>
            <tr>
                <td><span>Телефон</span></td>
                <td><span class="text-nowrap"><?= $model->phone; ?></span></td>
            </tr>
            <tr>
                <td><span>Электронная почта</span></td>
                <td><?= $model->email; ?></td>
            </tr>
        </table>
    </div><!--.order-info--params-->

    <? if ($model->baskets) : ?>
        <div class="tbl-cart-container">
            <table class="tbl-cart tbl-order-info">
                <tr>
                    <th colspan="2">Товар</th>
                    <th class="cell-num">Кол-во</th>
                    <th class="cell-total">Стоимость</th>
                </tr>

            <? foreach($model->baskets as $shopBasket) : ?>
                <tr>
                    <td class="cell-photo">
                        <a href="<?= $shopBasket->url ? $shopBasket->url : "#"?>">
                            <img src="<?= $shopBasket->image ? $shopBasket->image->src : "#" ?>" alt="">
                        </a>
                    </td>
                    <td class="cell-info">
                        <div class="title">
                            <a href="<?= $shopBasket->url; ?>"><?= $shopBasket->name; ?></a>
                        </div>
                        <!--<div class="art">Артикул: <?/**/?></div>-->
                    </td>
                    <td class="cell-num">
                        <div class="static-number"><strong><?= $shopBasket->quantity; ?></strong> × <?= \Yii::$app->money->convertAndFormat($shopBasket->money); ?></div>
                    </td>
                    <td class="cell-total">
                        <!--<div class="old">25000руб.</div>-->
                        <div class="new"><span class="amount"><?= \Yii::$app->money->convertAndFormat($shopBasket->money->multiply($shopBasket->quantity)); ?></span> <!--<span class="rb">руб.</span>--></div>
                    </td>
                </tr>

            <? endforeach; ?>
            </table>
        </div>
    <? endif;?>

    <div class="tbl-cart-total tbl-order-info-total">
        <div class="lbl">Итого: </div>
        <div class="amount"><span class="number">62 800</span> <span class="rb">руб.</span></div>
    </div>

<?= \Yii::$app->view->render('@app/views/modules/cms/user/_footer'); ?>
