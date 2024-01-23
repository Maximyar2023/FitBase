<?php

namespace frontend\models;

use yii\data\ActiveDataProvider;

class ClubSearch extends Club
{
    public $isactive;
    public static function tableName()
    {
        return 'club';
    }

    public function rules()
    {
        return [
            ['name', 'safe'],
            ['isactive', 'boolean'],
        ];
    }

    public function search($params)
    {
        $query = static::find();
        //$query = static::find()->where(['date_delete' => null]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if(!$this->validate()) {
            return $dataProvider;
        }

        //по умолчанию не показываем удаленные
        //$query->andFilterWhere([$query->andFilterWhere(['<>','date_delete','NULL']);]);
        //$query->andFilterWhere(['date_delete' => 'NULL']);
        if(!$this->isactive){
            $query->andFilterWhere(['is', 'date_delete', new \yii\db\Expression('null')]);
        }
        $query->andFilterWhere(['like','name',$this->name]);
        return $dataProvider;
    }

}