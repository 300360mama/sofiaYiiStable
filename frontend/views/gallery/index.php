<?php
use frontend\components\AsideWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="maincontent col-md-8 col-xs-12">


    <h1 class="col-xs-12 text-center">Popular Post</h1>

    <?php foreach ($listRandImg as $album=>$path):?>
        <figure class="col-xs-6 col-sm-4  col-lg-3 ">
            <a href="<?=Url::to(['/gallery/album/'.$album])?>" class="col-xs-12">
            <?=Html::img($webRootPath.'/'.$path, ['class'=>'col-xs-12'])?>
            <figcaption class="col-xs-12 text-center">
                <h2>
                    <?=$album?>
                </h2>
            </figcaption>
            </a>
        </figure>
    <?php endforeach;?>


</div>
<aside class="col-md-4 col-xs-12">

    <?=AsideWidget::widget(); ?>
</aside>