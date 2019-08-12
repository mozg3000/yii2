<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 30.07.2019
 * Time: 14:10
 */

namespace app\components;


use app\models\Users;
use yii\base\Component;
use yii\web\IdentityInterface;

class AuthComponent extends Component
{
    /**
     * @param IdentityInterface|Users $model
     * @return bool
     */

    public function signIn(IdentityInterface &$model):bool {

        if(!$model->validate(['email', 'password'])){

            return false;
        }
        $user = $this->getUserByEmail($model->email);
//        return $user->password_hash;

        if(!$this->validatePassword($model->password, $user->password_hash)){

            $model->addError('password', 'Ошибка логина или пароля');
            return false;
        }
        return \Yii::$app->user->login($user, 3600);
    }
    private function validatePassword($password, $passwordHash){

        return \Yii::$app->security->validatePassword($password, $passwordHash);
    }
    private function getUserByEmail($email){

        return Users::find()->andWhere(['email' => $email])->one();
    }
    public function signUp(Users &$model):bool{

        if(!$model->validate(['email', 'password'])){

            return false;
        }

        $model->password_hash = $this->generateHashPassword($model->password);
        $model->auth_key = $this->generateAuthKey();

       if( $model->save()){

           $user = \Yii::$app->authManager->getRole('user');
           \Yii::$app->authManager->assign($user, $model->getId());

           return true;
       }
       return false;
    }
    public function generateAuthKey():string{

        return \Yii::$app->security->generateRandomString();
    }
    public function generateHashPassword(string $password):string{

        return \Yii::$app->security->generatePasswordHash($password);
    }
}