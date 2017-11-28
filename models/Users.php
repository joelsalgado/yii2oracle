<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;

class Users extends \yii\db\ActiveRecord
{
    
    public function behaviors()
    {
        return [
        [
            'class' => TimestampBehavior::className()
        ],
    ];
    }

    
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [[ 'name', 'last_name'], 'required', 'message' => 'Campo Obligatorio.'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'last_name', 'last_name2'], 'string', 'max' => 255],
            [['date'],'date', 'format'=>'dd/mm/yyyy'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'last_name' => 'Apellido Paterno',
            'last_name2' => 'Apellido Materno',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'date' => 'Fecha de Nacimiento',
        ];
    }


    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                
                $sql = "SELECT ".Yii::$app->params['sequenceUsers'].".NEXTVAL FROM DUAL";
                $result = Yii::$app->db->createCommand($sql)->queryOne();
                
                $this->id = $result["NEXTVAL"];
            }
            return true;
        }

    }
}
