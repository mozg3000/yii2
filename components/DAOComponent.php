<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 29.07.2019
 * Time: 10:50
 */

namespace app\components;


use yii\db\Query;

class DAOComponent
{
    private function getConnection(){

        return \Yii::$app->db;
    }
    public function getUsers(){

        $sql = 'select * from `users`;';

        return $this->getConnection()->createCommand($sql)->queryAll();
    }
    public function getUserActivities($user_id){

        $sql = 'select * from activity where user_id=:user;';

        return $this->getConnection()->createCommand($sql, [':user' => $user_id])
            //->rawSql()
            ->queryAll();
    }
    public function getFirstActivity(){

        return (new Query())->from('activity')
                            ->orderBy(['id'=> SORT_DESC])
                            ->select(['id', 'title'])
                            ->andWhere(['useNotification' => 1])
                            ->limit(3)
                            ->one($this->getConnection());
    }
    public function getActivityCount(){

        return (new Query())->from('activity')
            ->select(['id', 'title'])
            ->scalar($this->getConnection());
    }
    public function validatePassword($email, $pass_hash):bool {

        $res = (new Query())->from('users')
            ->select(['id', 'email'])
            ->andWhere(['password_hash' => $pass_hash])
            ->andWhere(['email' => $email])
            ->one($this->getConnection());

        return $res['email'] === $email;
    }
    public function findUser($id)
    {
        $res = (new Query())->from('users')
            ->select(['id', 'email'])
            ->andWhere(['id' => $id])
            ->one($this->getConnection());

        return $res['email'];
    }
    public function findUserActivities($id)
    {
        $res = (new Query())->from(['activity', 'users'])
            ->select(['users.email', 'activity.title', 'activity.startday'])
            ->andWhere(['activity.user_id' => $id,
                'users.id' => $id])
//            ->andWhere(['users.id' => $id])
            ->one($this->getConnection());

        return $res;
    }
}