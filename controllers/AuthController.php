<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 30.07.2019
 * Time: 13:49
 */

namespace app\controllers;


use app\models\Activity;
use app\models\Users;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionSignUp(){

        $model = new Users();

        if(\Yii::$app->request->isPost){

            $model->load(\Yii::$app->request->post());
            $model->scenarioSignUp($model);

            if(\Yii::$app->auth->signUp($model)){

                return $this->redirect(['/auth/sing-in']);
            }
        }

        return $this->render('singup', ['model'=> $model]);
    }
    public function actionSignIn(){

        $model = new Users();
//        $model = Activity::find()->andWhere('id=:id', [':id' => $id]);

//        return var_dump($model);

        if(\Yii::$app->request->isPost){

            $model->load(\Yii::$app->request->post());
            $model->scenarioSignIn($model);
//            return var_dump(\Yii::$app->auth->signIn($model));
            if(\Yii::$app->auth->signIn($model)){

                $year = date("Y", time());
                $month = date("m", time());

                return $this->redirect(["/calendar/show?year=$year&month=$month"]);
            }
        }

        return $this->render('signin', ['model'=> $model]);
    }
}