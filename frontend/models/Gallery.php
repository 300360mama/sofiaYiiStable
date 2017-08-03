<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "galerey".
 *
 * @property string $imgname
 * @property string $comment
 * @property string $date
 * @property integer $moderation
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'galerey';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imgname', 'comment', 'date', 'moderation'], 'required'],
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['moderation'], 'integer'],
            [['imgname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'imgname' => 'Imgname',
            'comment' => 'Comment',
            'date' => 'Date',
            'moderation' => 'Moderation',
        ];
    }
}
