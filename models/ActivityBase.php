<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $startday
 * @property string $deadline
 * @property int $isBlocked
 * @property string $email
 * @property int $useNotification
 * @property string $createAt
 * @property int $user_id
 *
 * @property Users $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'startday', 'user_id'], 'required', 'message' => 'Обязательное поле!!!'],
            [['description'], 'string', 'min' => 5, 'max' => 300],
            [['startday', 'deadline', 'createAt'], 'safe'],
            [['isBlocked', 'useNotification', 'user_id'], 'integer'],
            [['title', 'email'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'startday' => Yii::t('app', 'Startday'),
            'deadline' => Yii::t('app', 'Deadline'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'email' => Yii::t('app', 'Email'),
            'useNotification' => Yii::t('app', 'Use Notification'),
            'createAt' => Yii::t('app', 'Create At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
