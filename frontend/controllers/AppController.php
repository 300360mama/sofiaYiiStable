<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10.06.17
 * Time: 23:39
 */

namespace frontend\controllers;


use yii\web\Controller;
use Yii;
use SplFileInfo;

class AppController extends Controller
{
    private $pathToGallery='/imgs/gallery';
    public $extensions=['jpg','png'];
    protected $quantityImgsToPage=2;

    public function getPathToGallery(){
        $path=Yii::getAlias('@webroot') .$this->pathToGallery;

        return $path;

    }
    public function getWebRootToGallery(){
        $path=Yii::getAlias('@web').$this->pathToGallery;

        return $path;

    }
    public function getImage($albumName){
        $pathToAlbum=$this->getPathToGallery().'/'.$albumName;
        $tmpImgs=scandir($pathToAlbum);
        if(count($tmpImgs)==2) return $imgs=[];

        $imgs=[];
        foreach ($tmpImgs as $img) {
            $ext=new SplFileInfo($pathToAlbum.'/'.$img);
            if ($img=='.'||$img=='..') continue;

            if(is_file($pathToAlbum.'/'.$img) && in_array($ext->getExtension(), $this->extensions)){
                $imgs[]=$img;
            }


        }
        return $imgs;
    }

    public function getRandomImg(array $listAlbum){
        $imgs=[];

        foreach ($listAlbum as $album){

                $tmpImgs=$this->getImage($album);
                if (empty($tmpImgs)){
                    $imgs[$album]='exempl.png';
                    continue;
                }
                $pathToRandImg=$album.'/'.$tmpImgs[array_rand($tmpImgs, 1)];
                $imgs[$album]=$pathToRandImg;

        }

        return $imgs;
    }

    public function getListAlbum($pathToGallery){


        if(!is_dir($pathToGallery)) return false;

        $tmpImg=scandir($pathToGallery);
        $imgs=[];
        foreach ($tmpImg as $name){
            if($name=='.'||$name=='..'||!is_dir($pathToGallery.'/'.$name)) continue;

                $imgs[]=$name;

        }
        return $imgs;
    }
}