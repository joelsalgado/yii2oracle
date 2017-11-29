<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "civil_status".
 *
 * @property integer $id
 * @property string $name_civil_status
 */
class CivilStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'civil_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_civil_status'], 'required'],
            [['id'], 'integer'],
            [['name_civil_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_civil_status' => 'Nombre',
        ];
    }


    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                
                $sql = "SELECT ".Yii::$app->params['sequenceCivil'].".NEXTVAL FROM DUAL";
                $result = Yii::$app->db->createCommand($sql)->queryOne();
                
                $this->id = $result["NEXTVAL"];
            }
            return true;
        }

    }


}
