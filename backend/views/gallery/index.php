<?php
use yii\helpers\Url;
?>
<h1>Выберите действие</h1>

<a href="<?=Url::to('/admin/gallery/delete-photo')  ?>" class="btn btn-success" >
    Удалить фото
    <i class="fa fa-minus" aria-hidden="true"></i>

</a>
<a href="<?=Url::to('/admin/gallery/add-photo')  ?>" class="btn btn-success" >

    Добавить фото
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>

<a href="<?=Url::to('/admin/album')  ?>" class="btn btn-success" >Редактировать альбомы</a>






