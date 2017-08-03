<?php
use yii\widgets\ActiveForm;

?>

<?php if ($flash) echo $flash->getFlash('addPhoto');?>

<?php

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <!--<div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>-->
    <div class="form-group">
        <label for="imageAlbum">Выберите альбом для загрузки фото</label>
        <?= $form->field($model, 'imageAlbum')->dropDownList($albumList)?>

    </div>
    <div class="form-group">
        <label for="imageFile">Выберите фото (не больше 10)</label>
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => 'multiple']) ?>

    </div>




    <button>Submit</button>

<?php ActiveForm::end() ?>