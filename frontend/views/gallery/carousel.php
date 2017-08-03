<?php
use yii\helpers\Html;
?>



<?php foreach ($imgs as $img):?>
    <?php if($img == $imgName): ?>
           <div class="item active">

    <?php else: ?>
            <div class="item">
    <?php endif; ?>

    <?= Html::img([$webPathRoot.'/'.$albumName.'/'.$img],['alt'=>'photo']);?>

            </div>
<?php endforeach;?>
