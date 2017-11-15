<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 22.09.2015
 */
/* @var $this yii\web\View */
/* @var $model \v3toys\skeeks\models\V3toysOrder */
?>
<div class="sx-header-label">
</div>
<!--
<div class="form-group">
    <div class="row">
        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-sm-offset-1 col-sm-10">
            <label class="form-label form-label-inline">
                Регион
            </label>
        </div>
        <div class='col-lg-4 col-md-5  col-lg-offset-0 col-sm-offset-1 col-sm-10'>
            <label class="form-label form-label-inline">
                <a href="#" onclick="new sx.classes.ModalRegionPjaxReload({
                    'id' : 'sx-cart-full'
                }); return false;" style="border-bottom: dotted 1px;">
                    <? /*= \Yii::$app->dadataSuggest->address ? \Yii::$app->dadataSuggest->address->regionString : "Выбрать город"; */ ?>
                </a>
            </label>
        </div>
    </div>
</div>-->

<? /*= $form->field($model, 'courier_address', [
    'template'      => "<div class=\"row\"><div class=\"col-lg-3 col-lg-offset-1 col-md-3 col-sm-offset-1 col-sm-10\">{label}</div>\n<div class='col-lg-4 col-md-5  col-lg-offset-0 col-sm-offset-1 col-sm-10'>{input}{hint}{error}</div></div>",
'labelOptions'  => ['class' => 'form-label form-label-inline'],
])->textInput([
    'placeholder' => "Адрес (улица, дом, кв)",
            'readonly' => "readonly",
            'onclick' => new \yii\web\JsExpression(<<<JS
new sx.classes.ModalRegionPageReload(); return false;
JS
)
,
]); */ ?>

<div class="order-form">
    <section class="order-form--group">
        <header class="order-form--group--title">Адрес доставки</header>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-tbl">

                    <?=
                    $form->field($model, 'courier_address', [
                        'template' => "<div class=\"tbl-cell lbl\">{label}</div>\n<div class='tbl-cell'><div class='form-control--wrapper required'>{input}</div>{hint}{error}</div>",
                        'errorOptions' => ['class' => 'form-note'],
                        'options' => ['class' => 'tbl-row'],
                    ])->widget(
                        \skeeks\cms\dadataSuggest\widgets\suggest\DadataSuggestInputWidget::className(),
                        [
                            'options' =>
                                [
                                    'placeholder' => "Адрес (улица, дом, кв)",
                                ],

                            'clientOptions' =>
                                [
                                    'suggestOptions' =>
                                        [
                                            //'triggerSelectOnSpace' => true,
                                            //'triggerSelectOnBlur' => true,

                                            'constraints' => [
                                                [
                                                    'locations' => \Yii::$app->dadataSuggest->address->getRegionArray(),

                                                    'deletable' => false,
                                                    'label' => ''
                                                ]
                                            ],
                                            'restrict_value' => true,
                                        ],
                                    'onInit' => new \yii\web\JsExpression(<<<JS
                function(e, data)
                {
                    data.DadataSuggest.bind('onSelect', function()
                    {
                        data.DadataSuggest.bind('afterSave', function()
                        {
                            $.pjax.reload({container:'#sx-cart-full'});

                            /*sx.block('body');
                            window.location.reload();*/
                        });

                        data.DadataSuggest.save();
                        return false;
                    });
                }
JS
                                    )

                                ]
                        ]);
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>


