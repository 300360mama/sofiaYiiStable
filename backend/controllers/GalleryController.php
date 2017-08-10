<?php

namespace backend\controllers;

use Yii;
use backend\controllers\AppController;
use backend\models\GalleryUpload;
use yii\web\UploadedFile;
use backend\models\GalleryAlbums;
use yii\filters\AccessControl;

class GalleryController extends AppController
{

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }

    public function actionIndex()

    {
        $albums=GalleryAlbums::find()->asArray()->all();
        return $this->render('index', ['albums'=>$albums]);
    }

    public function actionAddPhoto()
    {
        $model = new GalleryUpload();
        $albumTempList=GalleryAlbums::find()->asArray()->all();

        $album=new GalleryAlbums();
        $albumList=$album->getAlbumList($albumTempList);



        if (Yii::$app->request->isPost) {
            $albumName=Yii::$app->request->post('GalleryUpload')['imageAlbum'];
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

            if ($model->uploadGallery($albumName)) {
                // file is uploaded successfull
                $session=Yii::$app->session;
                $session->setFlash('addPhoto', 'Add is good');
                return $this->render('addPhoto', ['flash'=>$session, 'model' => $model,'albumList'=>$albumList]);
            }
        }
        $session=Yii::$app->session;
        $session->setFlash('addPhoto', 'Upload is  warning!!!!');
        return $this->render('addPhoto', ['flash'=>$session, 'model' => $model, 'albumList'=>$albumList]);
    }




    public function actionDeletePhoto(){
        $data=Yii::$app->request->post();
        $album=!empty(Yii::$app->request->get('album'))?Yii::$app->request->get('album'):'';
        $numberPage=!empty((int) Yii::$app->request->get('page'))?(int) Yii::$app->request->get('page'):1;

        $model=new GalleryAlbums();

        if(!$model->load($data)&&empty($album)){
            $listAlbum=GalleryAlbums::find()->asArray()->all();
            $albumList=$model->getAlbumList($listAlbum);
            return $this->render('selectAlbum', ['model'=>$model, 'albumList'=>$albumList]);
        }

        $albumName=!empty($model->albumName)?$model->albumName:$album;

        $listImgs=$this->getImage($albumName);
        $quantityPage=ceil(count($listImgs)/$this->quantityImgsToPage);
        $images=array_slice($listImgs, $this->quantityImgsToPage*($numberPage-1), $this->quantityImgsToPage);


        return $this->render('deletePhoto', ['images'=>$images, 'numberPage'=>$numberPage, 'albumName'=>$albumName, 'quantityPage'=>$quantityPage]);

    }

    public function actionDelItem(){

           $album=Yii::$app->request->get('album');
           $images=Yii::$app->request->get('images');

           $path=$this->getPathToGallery().'/'.$album.'/';
           if(is_array($images) && is_dir($path)){
               foreach ($images as $image){
                   unlink($path.$image);
               }
           }



           return $this->redirect('/admin/gallery/delete-photo/'.$album.'/1');
    }



}
