<?php


namespace frontend\controllers;

use frontend\controllers\AppController;
use backend\models\GalleryAlbums;
use Yii;


class GalleryController extends AppController
{


    public function actionIndex(){

        $listAlbums=$this->getListAlbum($this->getPathToGallery());
        $webRootPath=$this->getWebRootToGallery();
        $listRandImg=$this->getRandomImg($listAlbums);

        return $this->render('index', ['listRandImg'=>$listRandImg,'webRootPath'=>$webRootPath]);
    }

    public function actionAlbum(){


        $webPathRoot=$this->getWebRootToGallery();
        $album=Yii::$app->request->get('album', '');
        $numberPage=(int) Yii::$app->request->get('page');
        $albumName=GalleryAlbums::find()->where(['albumName'=>$album])->exists()?$album:'';

        $listImgs=$this->getImage($albumName);

        $quantityPage=ceil(count($listImgs)/$this->quantityImgsToPage);
        $images=array_slice($listImgs, $this->quantityImgsToPage*($numberPage-1), $this->quantityImgsToPage);

        return $this->render('album',['webPathRoot'=>$webPathRoot, 'albumName'=>$albumName, 'images'=>$images, 'numberPage'=>$numberPage, 'quantityPage'=>$quantityPage]);
    }

    public  function actionShowCarousel(){

        $albumName=Yii::$app->request->get('albumName');
        $imgName=Yii::$app->request->get('imgName');
        $imgs=$this->getImage($albumName);
        $webPathRoot=$this->getWebRootToGallery();
        $this->layout=false;
        return $this->render('carousel',['imgs'=>$imgs, 'imgName'=>$imgName, 'webPathRoot'=>$webPathRoot, 'albumName'=>$albumName]);
    }


}