<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\addcat;
use app\models\Todo;

class SiteController extends Controller
{
  

      public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
         $model = new addcat();
        return $this->render('index' , [ 'model' => $model]);
    }
    
    
    public function actionDisplay()
    {
        return $this->renderPartial('display');
    }
    
    public function actionInsert(){
          $model = new Todo();
          $model->name= $_POST['name'];
          $model->Category_id =(int) $_POST['Category_id'];
          
          if ($model->save()) {
              return 1;
          } else {
              return 0;
          }
   }
    
   public function actionDeletetodo(){
       $todo = Todo::findOne($_POST['id']);
       if($todo->delete()){
           return 1;
       }else{
           return 0;
       }
   }
}
