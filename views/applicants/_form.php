<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\BirthEntity;
use app\models\CivilStatus;
use app\models\Nationalities;
use yii\widgets\MaskedInput;
?>

<div class="applicants-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style'=>'text-transform:uppercase;']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'last_name2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'CURP')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'lada_celphone')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'celphone')->textInput() ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'lada_phone')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'gender')->radioList(['H' => 'Hombre', 'M' => 'Mujer']); ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'date')->widget(MaskedInput::className(), [
                'name' => 'input-31',
                'clientOptions' => ['alias' =>  'date']
            ]) ?>
        </div>
        <div class="col-lg-4">
             <?= $form->field($model, 'birh_entity_id')->dropDownList(ArrayHelper::
                map(BirthEntity::find()->asArray()->all(), 'id', 'name_entity') ) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'civil_status_id')->dropDownList(ArrayHelper::
                map(CivilStatus::find()->asArray()->all(), 'id', 'name_civil_status') ) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'nationality_id')->dropDownList(ArrayHelper::
                map(Nationalities::find()->asArray()->all(), 'id', 'NAME_NATIONALITIES') ) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'VIGENCY_IDENTIFY')->radioList(['SI' => 'SI', 'NO' => 'NO']); ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'KEY_ELECTOR')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'OTHER_DOCUMENT')->textInput(['maxlength' => true]) ?>
        </div>


    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>