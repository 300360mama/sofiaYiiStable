<?php
use yii\helpers\Url;
use yii\i18n\Formatter;
?>
<div class="me col-xs-12 hidden-xs">
    <div class="mebg col-xs-12 ">
        <img class="center-block" src="" alt="">
        <h4 class="text-center col-xs-12">София </h4>
        <span class="text-center col-sm-12" >
                Профессиональный рерайтер и просто хороший человек
            </span>
    </div>
</div>
     <?php if ($categories): ?>
<div class="category col-xs-12">
    <h4 class="col-xs-12 text-left">Категории</h4>

       <?php foreach ($categories as $category): ?>
           <?php if ($category['category']=='all') continue; ?>
        <section class="col-sm-12 col-xs-6">
            <a href="">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
            <span><?= $category['category'] ?></span>
        </section>

    <?php endforeach; ?>


</div>
     <?php endif; ?>

<div class="posts col-xs-12 hidden-xs">

    <input  type="radio" name="tab" id="tab_1" checked>
    <label for="tab_1" class="text-center col-xs-6">
        Последние статьи
    </label>
    <input type="radio" name="tab" id="tab_2">
    <label for="tab_2" class="text-center col-xs-6">
        Последние новости
    </label>

    <article class="tab_1 col-xs-12">
        <?php foreach ($postSidebar as $itemPost):?>


                <section  class="col-xs-12">
                    <span class="text-center col-xs-12"><?= $itemPost['title'] ?></span>
                    <span class="text-left col-xs-12"><?= substr($itemPost['content'], 0,150)?>...</span>
                    <span class="text-left col-xs-5"><?=Yii::$app->formatter->asDate($itemPost['date'],'dd-mm-yyyy') ?></span>
                    <span class="text-left col-xs-7"><a href="<?=Url::to(['blog/post/'.$itemPost['id']]) ?>">Читать полностью...</a></span>

                </section>

        <?php endforeach;?>

    </article>
    <article class="tab_2 col-xs-12">
        <?php foreach ($newsSidebar as $itemNews):?>

            <section  class="col-xs-12">
                <span class="text-center col-xs-12"><?= $itemNews['title'] ?></span>
                <span class="text-left col-xs-12"><?= substr($itemNews['content'], 0,150)?>...</span>
                <span class="text-left col-xs-5"><?= Yii::$app->formatter->asDate($itemNews['date'], 'dd-mm-yyyy') ?></span>
                <span class="text-left col-xs-7"><a href="<?=Url::to(['news/post/'.$itemNews['id']]) ?>">Читать полностью...</a></span>

            </section>

        <?php endforeach;?>

    </article>
</div>


<div class="galerey col-xs-12 hidden-xs">
</div>

<div class="subscribe col-xs-12 text-center">
    <h3 class="col-lg-12 text-center">subscribe now</h3>
    <span class="col-lg-12 text-center" >Lorem ipsum dolor sit amet, consectetur  adipiscing elit.</span>
    <form class="col-lg-12" action="">
        <input class="col-lg-10 col-lg-offset-1" type="text" placeholder="Введите свой емейл">
        <input class="col-lg-8 col-lg-offset-2" type="button" value="subscribe Now">
    </form>
</div>