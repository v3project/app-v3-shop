<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 23.07.2016
 */
/* @var $this yii\web\View */
/* @var $model \v3toys\skeeks\models\V3toysOrder */
?>

<div class="panel order-item">
    <a class="order-item-header"
       role="button"
       data-toggle="collapse"
       data-parent="#accordion-orders"
       href="#order-item-<?= $model->id; ?>"
       aria-expanded="false"
       aria-controls="order-item-<?= $model->id; ?>">
        <span class="number">
            <i class="fa fa-angle-down"></i>
            №<?= $model->id; ?>
        </span>
        <span class="date">от <?= \Yii::$app->formatter->asDatetime($model->created_at); ?></span>
        <span class="status"><?= $model->v3toys_status_id ? $model->status->name : ""; ?></span>
        <span class="summa">Сумма: <span class="amount">
                <?= \Yii::$app->money->convertAndFormat($model->money); ?>
            </span></span>
    </a>

    <div id="order-item-<?= $model->id; ?>" class="collapse">
        <div class="order-item-content">
            <div class="tbl-cart-container">

                <? if ($model->baskets) : ?>
                    <div class="tbl tbl-cart">

                        <? foreach($model->baskets as $shopBasket) : ?>
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    <a href="<?= $shopBasket->url ? $shopBasket->url : "#"?>">
                                        <img src="<?= $shopBasket->image ? $shopBasket->image->src : "#" ?>" alt="">
                                    </a>
                                </div>
                                <div class="tbl-cell">
                                    <div class="prod-title">
                                        <a href="<?= $shopBasket->url ? $shopBasket->url : "#"?>"><?= $shopBasket->name; ?></a>
                                    </div>
                                    <span class="prod-art">арт. <?= $shopBasket->product ? $shopBasket->product->cmsContentElement->relatedPropertiesModel->getAttribute('sku') : ""; ?></span>
                                </div>
                                <div class="tbl-cell tbl-cell-price"><?= \Yii::$app->money->convertAndFormat($shopBasket->money); ?></div>
                                <div class="tbl-cell tbl-cell-num static"><?= \Yii::$app->formatter->asInteger($shopBasket->quantity); ?> шт.</div>
                                <div class="tbl-cell tbl-cell-summa"><?= \Yii::$app->money->convertAndFormat($shopBasket->money->multiply($shopBasket->quantity)); ?></div>
                            </div>
                        <? endforeach; ?>
                    </div>
                <? endif;?>
            </div>

            <div class="order-price-info">
                <div class="item">
                    <span class="lbl">Сумма заказа:</span>
                    <span class="amount"><?= \Yii::$app->money->convertAndFormat($model->moneyOriginal); ?></span>
                </div>
                <div class="item">
                    <span class="lbl">Доставка:</span>
                    <span class="amount"><?= \Yii::$app->money->convertAndFormat($model->moneyDelivery); ?></span>
                </div>
                <div class="item">
                    <span class="lbl">Скидка:</span>
                    <span class="amount">-<?= \Yii::$app->money->convertAndFormat($model->moneyDiscount); ?></span>
                </div>
                <div class="item total">
                    <span class="lbl">К оплате:</span>
                    <span class="amount"><?= \Yii::$app->money->convertAndFormat($model->money); ?></span>
                </div>
            </div><!--.order-price-info-->
            <div class="order-item-info">
                <p>
                    <strong>Получатель:</strong>
                    <?= $model->name; ?>,
                    <span class="text-nowrap"><?= $model->phone; ?></span>,
                    <a href="#"><?= $model->email; ?></a>
                </p>
                <p>
                    <strong>Способ получения:</strong>
                    <?= $model->deliveryFullName; ?>
                </p>
                <p>
                    <strong>Способ оплаты:</strong>
                    <?= $model->paymentName; ?>
                </p>
            </div>


        </div>
    </div>
</div>
