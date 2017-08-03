<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.06.17
 * Time: 23:06
 */

namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\News;
use yii\data\Pagination;
use Yii;

class NewsController extends Controller
{


    public function actionIndex(){

        $query = News::find('category');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>4]);
        $news = $query->orderBy('date DESC')->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'news' => $news,
            'pages' => $pages,
        ]);
    }


    public function actionPost(){

        $id=Yii::$app->request->get('id');
        $article=News::find()->where(['id'=>$id])->asArray()->one();
        return $this->render('post',['id'=>$id, 'article'=>$article]);
    }
}