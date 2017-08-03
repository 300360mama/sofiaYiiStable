<?php

namespace backend\controllers;

use Yii;
use backend\models\GalleryAlbums;
use yii\data\ActiveDataProvider;
use backend\controllers\AppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlbumController implements the CRUD actions for GalleryAlbums model.
 */
class AlbumController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GalleryAlbums models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => GalleryAlbums::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GalleryAlbums model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GalleryAlbums model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryAlbums();
        $albumName=Yii::$app->request->post('GalleryAlbums')['albumName'];
        $albumList=$this->getListAlbum($this->getPathToGallery());
        $path=$this->getPathToGallery().'/'.$albumName;

        if ($model->load(Yii::$app->request->post())) {
            if(!in_array($albumName, $albumList)){
                mkdir($this->getPathToGallery().'/'.$albumName);
                $model->save();
            }else{

                Yii::$app->session->setFlash('uniqueId', 'Name must be unique');
                return $this->redirect(['create', 'id' => $model->id]);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GalleryAlbums model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldAlbumName=$model->albumName;

        $albumName=Yii::$app->request->post('GalleryAlbums')['albumName'];
        $albumList=$this->getListAlbum($this->getPathToGallery());
        $path=$this->getPathToGallery().'/'.$albumName;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if(in_array($oldAlbumName, $albumList)){
                rename($this->getPathToGallery().'/'.$oldAlbumName, $path);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GalleryAlbums model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $a=$this->findModel($id);
        $pathToAlbum=$this->getPathToGallery().'/'.$a->albumName;
        $this->findModel($id)->delete();
        //var_dump($this->findModel($id))

        if(is_dir($pathToAlbum)){
            $this->isEmptyDir($pathToAlbum)?rmdir($pathToAlbum):$this->deleteImgs($pathToAlbum);
        }








        return $this->render('delete', [
            'a' => $a,
        ]);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the GalleryAlbums model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryAlbums the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryAlbums::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
