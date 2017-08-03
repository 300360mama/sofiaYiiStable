<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GalleryAlbums */

$this->title = 'Create Gallery Albums';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-albums-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('uniqueId')): ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>
                <?=Yii::$app->session->getFlash('uniqueId') ?>
            </strong>
        </div>
    <?php endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
