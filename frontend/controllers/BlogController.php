<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.06.17
 * Time: 23:08
 */

namespace frontend\controllers;


use frontend\models\Post;
use yii\web\Controller;
use yii\data\Pagination;
use Yii;


class BlogController extends Controller
{
    public function actionIndex(){
        $query = Post::find('category');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>3]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'posts' => $posts,
            'pages' => $pages,
        ]);

    }
    public function actionPost(){

        $id=Yii::$app->request->get('id');
        $article=Post::find()->where(['id'=>$id])->asArray()->one();
        return $this->render('post',['id'=>$id, 'article'=>$article]);
    }
}