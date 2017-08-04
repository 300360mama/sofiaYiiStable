<?php
use yii\helpers\Html;
use frontend\components\PageWidget;
?>
<h1>
    <?=$albumName ?>
</h1>
<div class="row" id="myGallery">
    <?php foreach ($images as $img): ?>
        <?= Html::img([$webPathRoot.'/'.$albumName.'/'.$img],['class'=>'myImg img-thumbnail col-md-2 col-xs-3']) ?>
    <?php endforeach;?>

</div>

<?=PageWidget::widget(['albumName'=>$albumName, 'quantityPage'=>$quantityPage]); ?>

