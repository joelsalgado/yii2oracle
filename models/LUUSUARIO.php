<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "LU_USUARIO".
 *
 * @property double $USUARIO_ID
 * @property string $USUARIO_LOGIN
 * @property string $USUARIO_PASSWD
 */
class LUUSUARIO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LU_USUARIO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USUARIO_ID'], 'number'],
            [['USUARIO_LOGIN', 'USUARIO_PASSWD'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USUARIO_ID' => 'Usuario  ID',
            'USUARIO_LOGIN' => 'Usuario  Login',
            'USUARIO_PASSWD' => 'Usuario  Passwd',
        ];
    }
}
