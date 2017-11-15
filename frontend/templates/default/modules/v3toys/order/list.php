<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.10.2015
 */
/* @var $this yii\web\View */
\skeeks\cms\shop\widgets\ShopGlobalWidget::widget();
?>

<?= \Yii::$app->view->render('@app/views/modules/cms/user/_header', [
    'model' => \Yii::$app->user->identity,
    'title' => 'Мои заказы',
]); ?>

<header class="title-page">
    <h1>Мои заказы</h1>
</header>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => \v3toys\skeeks\models\V3toysOrder::find()->where(['user_id' => \Yii::$app->user->identity->id])->orderBy(['id' => SORT_DESC]),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]),
    "layout" => "{items}\n{pager}",
    'options' => [
        'tag' => 'ul',
        'class' => 'order-list',
        'id' => 'accordion-orders',
        'aria-multiselectable' => 'true',
    ],
    'itemView' => '_list',
    'itemOptions' => [
        'tag' => false,
    ],
]); ?>

<?= \Yii::$app->view->render('@app/views/modules/cms/user/_footer'); ?>
