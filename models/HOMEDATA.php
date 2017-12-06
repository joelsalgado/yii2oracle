<?php

namespace app\models;

use Yii;


class HOMEDATA extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'HOME_DATA';
    }

    public function rules()
    {
        return [
            [['STREET'], 'required'],
            [['ID', 'INTERIOR_NUMBER', 'STATUS', 'EXTERIOR_NUMBER', 'MUN_ID', 'KEY_STATE', 'KEY_MUN', 'SEC_ID'], 'number'],
            [['POSTAL_CODE', 'APPLICANTS_ID'], 'integer'],
            [['STREET', 'BETWEEN_STREET', 'AND_STREET'], 'string', 'max' => 150],
            [['OTHER_REFERENCE', 'LOCALITY'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'STREET' => 'Calle',
            'INTERIOR_NUMBER' => 'Numero Interior',
            'EXTERIOR_NUMBER' => 'Numero Exterior',
            'BETWEEN_STREET' => 'Entre Calle',
            'AND_STREET' => 'Y Calle',
            'OTHER_REFERENCE' => 'Otra Referencia',
            'MUN_ID' => 'Municipio',
            'LOCALITY' => 'Localidad',
            'KEY_STATE' => 'Clave del Estado',
            'KEY_MUN' => 'Clave del Municipio',
            'SEC_ID' => 'Seccion',
            'POSTAL_CODE' => 'Codigo Postal',
            'APPLICANTS_ID' => 'Id Solicitante',
            'STATUS' => 'Estatus',
        ];
    }

    public function getApplicants()
    {
        return $this->hasOne(Applicants::className(), ['id' => 'APPLICANTS_ID']);
    }

    public function getMun()
    {
        return $this->hasOne(MUNICIPALITY::className(), ['ID' => 'MUN_ID']);
    }

    public function getSec()
    {
        return $this->hasOne(SECTION::className(), ['ID' => 'SEC_ID']);
    }

    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {

                $sql = "SELECT ".Yii::$app->params['sequenceHome'].".NEXTVAL FROM DUAL";
                $result = Yii::$app->db->createCommand($sql)->queryOne();
                $this->ID = $result["NEXTVAL"];
            }
            $this->STATUS = 1 ;


            return true;
        }

    }
}
