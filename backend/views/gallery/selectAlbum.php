<?php
use yii\widgets\ActiveForm;

?>

<?php /*if ($flash) echo $flash->getFlash('addPhoto');*/?>

<?php /*var_dump($model)*/?>
<?php $form = ActiveForm::begin() ?>

<div class="form-group">
    <label for="albumName">Выберите альбом для загрузки фото</label>
   <?= $form->field($model, 'albumName')->dropDownList($albumList)?>

</div>



<button>Submit</button>

<?php ActiveForm::end() ?>
