<?php
use frontend\components\AsideWidget;
?>
<div class="maincontent col-md-8 col-xs-12">
    <h1 class="col-xs-12 text-center"><?=$article['title']?></h1>
    <?= $article['content']?>

    <span> <?=$article['date'] ?></span>

</div>
<aside class="col-md-4 col-xs-12">
    <?=AsideWidget::widget(); ?>
</aside>
