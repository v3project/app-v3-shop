<?
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (�����)
 * @date 06.03.2015
 */
/* @var $this \yii\web\View */
/* @var \skeeks\cms\models\Tree $model */

$opacity = $model->relatedPropertiesModel->getAttribute("opacity");
?>

<?= $this->render('@template/include/breadcrumbs', [
    'model' => $model
])?>

<!--=== Content Part ===-->
<section class="padding-xxs" <?= $opacity ? "style='opacity: {$opacity};'": ""?>>
    <div class="container content">
        <div class="row">
            <div class="col-md-12 sx-content">
                <?= $model->description_full; ?>

                <div id="center_content" style="padding-left: 20px; padding-bottom: 20px; width: 945px;">
                    <?= \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget::widget([
                        'viewFile' => '@app/views/widgets/BreadcrumbsCmsWidget/default',
                    ]); ?>

                    <?= \v3toys\skeeks\widgets\delivery\V3toysDeliveryWidget::widget(); ?>

                </div>

            </div>
        </div>
    </div>
</section>