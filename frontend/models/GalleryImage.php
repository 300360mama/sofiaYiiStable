<?php

namespace frontend\models;

use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;
use Imagine\Image\Box;

/**
 * This is the model class for table "gallery_image".
 *
 * @property integer $id
 * @property string $type
 * @property string $ownerId
 * @property integer $rank
 * @property string $name
 * @property string $description
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery_image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ownerId'], 'required'],
            [['rank'], 'integer'],
            [['description'], 'string'],
            [['type', 'ownerId', 'name'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'portfolio',
                'extension' => 'jpg',
                'directory' =>Yii::getAlias('@webroot') .'/imgs/portfolio/gallery',
                'url' => Yii::getAlias('@web') . '/imgs/portfolio/gallery',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'ownerId' => 'Owner ID',
            'rank' => 'Rank',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
