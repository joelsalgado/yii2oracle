<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "birth_entity".
 *
 * @property integer $id
 * @property string $name_entity
 */
class BirthEntity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'birth_entity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_entity'], 'required'],
            [['id'], 'integer'],
            [['name_entity'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_entity' => 'Name Entity',
        ];
    }


    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                
                $sql = "SELECT ".Yii::$app->params['sequenceBirth'].".NEXTVAL FROM DUAL";
                $result = Yii::$app->db->createCommand($sql)->queryOne();
                
                $this->id = $result["NEXTVAL"];
            }
            return true;
        }

    }
}
