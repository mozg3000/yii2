<?php


namespace app\controllers;


use yii\web\Controller;

class TeacherController extends Controller
{
    public function actionStudent(){
        $name = 'hilary';
        return $this->render('student', ['username'=>$name]);
    }

}