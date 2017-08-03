<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "galleryAlbums".
 *
 * @property integer $id
 * @property string $albumName
 */
class GalleryAlbums extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'galleryAlbums';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['albumName'], 'required'],
            [['albumName'], 'string', 'max' => 128],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'albumName' => 'Album Name',
        ];
    }

    public function getAlbumList($albumTempList){
        $albumList=[];

        foreach ($albumTempList as $album){
            $albumList[$album['albumName']]=$album['albumName'];

        }
        return $albumList;
    }
   /*
   * $images массив с именами фото
   *  $quantityImage количество изображений на странице
   * */
    public function getPage( $images, $quantityImage=2){


    }

}
