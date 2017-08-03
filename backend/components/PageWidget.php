<?php
namespace backend\components;

use yii\base\Widget;


class PageWidget extends Widget{

    public $numberPage;
    public $quantityPage;
    public $nextPage=3;
    public $prevPage=1;



public function init()
    {
        $this->numberPage=abs((int)$this->numberPage);
        if ($this->numberPage > $this->quantityPage|| $this->numberPage<1) {
            $this->numberPage = 1;
        }


        $this->prevPage= $this->numberPage - 1;
        if ($this->prevPage<1){
            $this->prevPage=null;
        }

        $this->nextPage = $this->numberPage + 1;

        if ($this->nextPage>$this->quantityPage) {
            $this->nextPage = null;
        }
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        return $this->render('page', ['numberPage'=>$this->numberPage, 'quantityPage'=>$this->quantityPage, 'nextPage'=>$this->nextPage, 'prevPage'=>$this->prevPage]);
    }
}