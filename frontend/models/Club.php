<?php

namespace frontend\models;

use common\models\User;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Club extends ActiveRecord
{

    public static function tableName()
    {
        return 'club';
    }

    public function rules()
    {
        return [
            ['name','required'],
            ['address','safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название клуба',
            'address' => 'Адрес',
            'date_create' => 'Дата создания',
            'user_create' => 'Пользователь,создавший запись',
            'date_update' => 'Дата обновления',
            'user_update' => 'Пользователь,обновивший запись',
            'date_delete' => 'Дата удаления ',
            'user_delete' => 'Пользователь,удаливший запись',
            'isactive' => 'Показать удаленные',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class,['id' => 'user_create']);
    }
    public function getUserName()
    {
        return (isset($this->user)) ? $this->user->username : "не задан";
    }

    public function getUserUpdate()
    {
        return $this->hasOne(User::class,['id' => 'user_update']);
    }
    public function getUserUpdateName()
    {
        return (isset($this->userUpdate)) ? $this->userUpdate->username : "не задан";
    }

    public function getUserDelete()
    {
        return $this->hasOne(User::class,['id' => 'user_delete']);
    }
    public function getUserDeleteName()
    {
        return (isset($this->userDelete)) ? $this->userDelete->username : "не задан";
    }

    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(),'id','name');
    }

}