<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.06.17
 * Time: 22:54
 */

namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\HomePage;

class MyController extends Controller
{

  public  function actionIndex(){

      $content=HomePage::find('content')->limit(1)->asArray()->all();
       return $this->render('index', ['content'=>$content]);
  }
}