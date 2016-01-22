<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class fhubWidget extends Widget{
    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('fhubWidget');
    }
}