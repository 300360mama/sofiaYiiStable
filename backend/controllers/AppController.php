<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25.06.17
 * Time: 20:49
 */

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use SplFileInfo;


class AppController extends Controller
{

    private $pathToGallery=__DIR__.'/../../frontend/web/imgs/gallery';
    public $extensions=['jpg','png'];
    protected $quantityImgsToPage=2;

    public function getPathToGallery(){


        return $this->pathToGallery;

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

    public function deleteImgs($path){
        if(!is_dir($path)) return false;

        $imgs=scandir($path);
        foreach ($imgs as $img) {
            if ($img=='.'||$img=='..') continue;
            unlink($path.'/'.$img);
        }
         return true;
    }

    public function isEmptyDir($path){
        if(!is_dir($path)) return false;

        $tmpImgs=scandir($path);
        if (count($tmpImgs)>2){
            return false;
        }

        return true;
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
}
