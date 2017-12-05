<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SECTION".
 *
 * @property double $ID
 * @property double $MUN_ID
 */
class SECTION extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SECTION';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'MUN_ID'], 'required'],
            [['ID', 'MUN_ID'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MUN_ID' => 'Mun  ID',
        ];
    }

    public static function getSec($cat_id){
        $sections = self::find()
            ->select(['ID'])
            ->where(['MUN_ID'=> $cat_id])
            ->asArray()
            ->all();
        $sec = [];
        foreach ($sections as $value){
            $sec[] = ["id"=> $value['ID'], "name"=>$value['ID']];
        }

        return $sec;
    }
}
