<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nationalities".
 *
 * @property integer $id
 * @property string $name_civil_status
 */
class Nationalities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nationalities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'NAME_NATIONALITIES'], 'required'],
            [['id'], 'integer'],
            [['NAME_NATIONALITIES'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'NAME_NATIONALITIES' => 'Nombre',
        ];
    }
}
