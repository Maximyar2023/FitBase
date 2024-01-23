<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use yii;

class Client extends ActiveRecord
{

    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'isactive' => 'Архив',
        ];
    }

    public function rules()
    {
        return [
            [['fio','type_people','birthday','access_club'],'required'],
        ];
    }
    public function getUser()
    {
        return $this->hasOne(Club::class,['id' => 'user_create']);
    }
    public function getUserName()
    {
        return (isset($this->user)) ? $this->user->username : "не задан";
    }
    public function getUserUpdate()
    {
        return $this->hasOne(Club::class,['id' => 'user_update']);
    }
    public function getUserUpdateName()
    {
        return (isset($this->userUpdate)) ? $this->userUpdate->username : "не задан";
    }
    public function getUserDelete()
    {
        return $this->hasOne(Club::class,['id' => 'user_delete']);
    }
    public function getUserDeleteName()
    {
        return (isset($this->userDelete)) ? $this->userDelete->username : "не задан";
    }

}