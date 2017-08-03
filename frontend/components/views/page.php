<?php
use yii\helpers\Html;
?>
<?php var_dump($quantityPage)?>


<?php if($numberPage>2):?>
    <?= Html::a('First Page',['gallery/album/'.$albumName.'/'.($numberPage-1)]) ?>
<?php endif; ?>

    <?= Html::a($numberPage,['gallery/album/'.$albumName.'/'.$numberPage]) ?>

<?php if($numberPage+1<=$quantityPage):?>
    <?= Html::a($numberPage+1,['gallery/album/'.$albumName.'/'.($numberPage+1)]) ?>
<?php endif; ?>
<?php if($numberPage<$quantityPage):?>
    <?= Html::a('Last Page',['gallery/album/'.$albumName.'/'.$quantityPage]) ?>
<?php endif; ?>







