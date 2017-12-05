<?php

namespace app\models;

use Yii;
use app\models\SECTION;

/**
 * This is the model class for table "MUNICIPALITY".
 *
 * @property double $ID
 * @property string $MUNICIPALITY_NAME
 */
class MUNICIPALITY extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MUNICIPALITY';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'MUNICIPALITY_NAME'], 'required'],
            [['ID'], 'number'],
            [['MUNICIPALITY_NAME'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MUNICIPALITY_NAME' => 'Municipality  Name',
        ];
    }


    public function getSections()
    {
        return $this->hasMany(SECTION::className(), ['MUN_ID' => 'ID']);
    }
}
