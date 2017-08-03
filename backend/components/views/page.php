<?php
use yii\helpers\Html;
?>

<?php if($numberPage>2):?>
    <?= Html::a('First Page',['gallery/delete-photo/first/1']) ?>
<?php endif; ?>

<?php if($numberPage-1>=1):?>
    <?= Html::a($numberPage-1,['gallery/delete-photo/first/'.($numberPage-1)]) ?>
<?php endif; ?>

    <?= Html::a($numberPage,['gallery/delete-photo/first/'.$numberPage]) ?>

<?php if($numberPage+1<=$quantityPage):?>
    <?= Html::a($numberPage+1,['gallery/delete-photo/first/'.($numberPage+1)]) ?>
<?php endif; ?>
<?php if($numberPage<$quantityPage):?>
    <?= Html::a('Last Page',['gallery/delete-photo/first/'.$quantityPage]) ?>
<?php endif; ?>







