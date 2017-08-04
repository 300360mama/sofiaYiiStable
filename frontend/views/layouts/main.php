<?php

use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\Html;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="container-fluid">

    <header>
        <div class="container">
            <div class="row">
                <h1 class="logo col-sm-12 col-xs-12  text-center">Sofia</h1>
            </div>
            <div class="row">
                <ul class="col-xs-12 ">
                    <li class="  col-xs-3 text-center"><a href="<?=Url::to(['my/index']) ?>">О нас</a></li>
                    <li class="  col-xs-3 text-center"><a href="<?=Url::to(['news/index']) ?>">Новости</a></li>
                    <li class=" col-xs-3 text-center"><a href="<?=Url::to(['gallery/index']) ?>">Фотогалерея</a></li>
                    <li class=" col-xs-3 text-center"><a href="<?=Url::to(['blog/index']) ?>">Блог</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="banner">
         <?=Html::img('@web/imgs/bunnerBG.png') ?>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <?= $content; ?>

            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <span class="col-xs-12 text-center"> <time><?=Yii::$app->formatter->asDate('now', 'yyyy'); ?></time> blogaris, All rights reserved.</span>
        </div>



    </div>
</footer>
<?php \yii\bootstrap\Modal::begin([

    'header'=>'',
    'id'=>'modalImg',
    'size'=>'modal-lg',

]);
echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';


\yii\bootstrap\Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>