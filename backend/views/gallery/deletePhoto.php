<?php
use backend\components\PageWidget;
use yii\helpers\Html;
?>


<?php foreach ($images as $image): ?>

    <img class="my gallery-image col-xs-6 col-sm-4 col-md-2 img-rounded" src="<?=Yii::getAlias('@web').'/../frontend/web/imgs/gallery/'.$albumName.'/'.$image ?>" alt="">

<?php endforeach; ?>

<div class="clearfix"></div>

<?=PageWidget::widget(['numberPage'=>$numberPage, 'quantityPage'=>$quantityPage]); ?>
<div class="clearfix"></div>

<?=Html::button('Delete Photo', ['class'=>'btn del-photo']) ?>


