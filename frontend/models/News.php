<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $imgpath
 * @property string $date
 * @property integer $rating
 *
 * @property Newsrating $newsrating
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'imgpath', 'date'], 'required'],
            [['content', 'imgpath'], 'string'],
            [['date'], 'safe'],
            [['rating'], 'integer'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'imgpath' => 'Imgpath',
            'date' => 'Date',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsrating()
    {
        return $this->hasOne(Newsrating::className(), ['id_article' => 'id']);
    }
}
