<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $imgpath
 * @property string $date
 * @property integer $categoryId
 *
 * @property Postcategory $category
 */
class Post extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'imgpath', 'date', 'categoryId'], 'required'],
            [['content', 'imgpath'], 'string'],
            [['date'], 'safe'],
            [['categoryId'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Postcategory::className(), 'targetAttribute' => ['categoryId' => 'id']],
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
            'categoryId' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Postcategory::className(), ['id' => 'categoryId']);
    }
}
