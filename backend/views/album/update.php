<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GalleryAlbums */

$this->title = 'Update Gallery Albums: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-albums-update">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
