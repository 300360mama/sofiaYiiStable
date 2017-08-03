<?php
use frontend\components\AsideWidget;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<div class="maincontent col-md-8 col-xs-12">
    <h1 class="col-xs-12 text-center">Popular Post</h1>

    <?php  foreach ($posts as $item): ?>
        <figure class="col-xs-12 ">
            <section class="article_content col-xs-12">
                <h2 class="col-xs-12 text-center"><?=$item['title']?></h2>
                <section class="col-xs-12 text-center" >
                    <span class="col-xs-12"><?= substr($item['content'],0,200)?>...</span>
                </section>
                <a href="<?=Url::to(['news/post/'.$item['id']]) ?>" class="col-xs-4 col-xs-offset-4">Читать больше...</a>
            </section>

        </figure>
    <?php endforeach;?>
    <?php echo LinkPager::widget([
        'pagination' => $pages,
    ]); ?>


</div>
<aside class="col-md-4 col-xs-12">
    <?=AsideWidget::widget(['view'=>'blog']); ?>
</aside>