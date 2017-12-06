<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;

class Applicants extends \yii\db\ActiveRecord
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
        return 'applicants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'last_name','gender'], 'required', 'message'=> 'Campo Requerido'],
            [['name', 'last_name', 'last_name2'], 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
            [['CURP'], 'match', 'pattern' => '/[A-Z]{4}\d{6}[HM][A-Z]{2}[B-DF-HJ-NP-TV-Z]{3}[A-Z0-9][0-9]/', 'message' => 'Formato no valido'],
            ['CURP', 'match', 'pattern' => '/^.{1,18}$/', 'message' => 'Tiene que tener 18 caracteres'],
            [['id', 'lada_celphone', 'celphone', 'lada_phone', 'phone', 'birh_entity_id', 'civil_status_id', 'nationality_id', 'created_at', 'updated_at', 'STATUS'], 'integer', 'message' => 'Sólo se aceptan numeros'],
            [['date'],'date', 'format'=>'dd/mm/yyyy', 'message' => 'Formato no valido'],
            [['name', 'last_name', 'last_name2', 'CURP', 'gender', 'VIGENCY_IDENTIFY', 'KEY_ELECTOR', 'OTHER_DOCUMENT'], 'string', 'max' => 255],
            ['email','email', 'message' => 'Formato no valido'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'last_name' => 'Apellido Paterno',
            'last_name2' => 'Apellido Materno',
            'CURP' => 'Curp',
            'lada_celphone' => 'Lada',
            'celphone' => 'Celular',
            'lada_phone' => 'Lada',
            'phone' => 'Telefono',
            'gender' => 'Sexo',
            'date' => 'Fecha',
            'birh_entity_id' => 'Entidad de Nacimiento',
            'civil_status_id' => 'Estado Civil',
            'nationality_id' => 'Nacionalidad',
            'email' => 'Email',
            'VIGENCY_IDENTIFY' => 'Identificaion oficial vigente (INE)',
            'KEY_ELECTOR' => 'Clave de Elector',
            'OTHER_DOCUMENT' => 'Otro comporbante de identificacion',
            'STATUS' => 'ESTATUS',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntity()
    {
        return $this->hasOne(BirthEntity::className(), ['id' => 'birh_entity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCivil()
    {
        return $this->hasOne(CivilStatus::className(), ['id' => 'civil_status_id']);
    }


    public function getNationalily()
    {
        return $this->hasOne(Nationalities::className(), ['id' => 'nationality_id']);
    }



    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                
                $sql = "SELECT ".Yii::$app->params['sequenceApplicants'].".NEXTVAL FROM DUAL";
                $result = Yii::$app->db->createCommand($sql)->queryOne();
                
                $this->id = $result["NEXTVAL"];
            }
            $this->STATUS = 1;

            return true;
        }

    }
}
