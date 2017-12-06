<?php

namespace app\models;

use yii\base\Model;

class Folio extends Model
{
    public $folio;

    public function rules()
    {
        return [
            [['folio'], 'required'],
            [['folio'], 'integer'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'folio' => 'Folio',
        ];
    }
}