<?php

namespace frontend\models;

use yii\data\ActiveDataProvider;
use kartik\daterange\DateRangeBehavior;

class ClientSearch extends Client
{
    public $date_range_3;
    public static function tableName()
    {
        return 'client';
    }

    public function rules()
    {
        return [
            [['fio','type_people','birthday'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = static::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if(!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['type_people' => $this->type_people]);
        $query->andFilterWhere(['is', 'date_delete', new \yii\db\Expression('null')]);
        $query->andFilterWhere(['like','fio',$this->fio]);

        $time_array = explode(" - ", $this->birthday);

        if(!empty($time_array)){
            if(isset($time_array[0]) && isset($time_array[1])){
                $query->andFilterWhere(['>=', 'birthday', $time_array[0]])
                    ->andFilterWhere(['<=', 'birthday', $time_array[1]]);
            }
        }
        return $dataProvider;
    }

}