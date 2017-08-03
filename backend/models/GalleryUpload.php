<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.06.17
 * Time: 23:00
 */

namespace backend\models;

use yii\base\Model;



class GalleryUpload extends Model
{
    public $imageFile;
    public $imageFiles;
    public $imageAlbum;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['imageFiles'], 'file', 'extensions' => 'png, jpg','maxFiles' => 3],

        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(__DIR__ . '/../../frontend/web/imgs/gallery/news12/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery($albumName){

        if($this->validate()){

            foreach ($this->imageFiles as $file){

                $path=__DIR__ .'/../../frontend/web/imgs/gallery/'.$albumName.'/'.$file->baseName.'.'.$file->extension;
                $file->saveAs($path);

            }

            return true;
        }else{
            return false;
        }
    }
}