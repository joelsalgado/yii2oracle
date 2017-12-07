<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use app\models\MUNICIPALITY;
use yii\helpers\Url;
?>

<div class="homedata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'STREET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INTERIOR_NUMBER')->textInput() ?>

    <?= $form->field($model, 'EXTERIOR_NUMBER')->textInput() ?>

    <?= $form->field($model, 'BETWEEN_STREET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AND_STREET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OTHER_REFERENCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MUN_ID')->dropDownList(ArrayHelper::
    map(MUNICIPALITY::find()->asArray()->all(), 'ID', 'MUNICIPALITY_NAME'), ['id' => 'mun_id'] ) ?>

    <?= $form->field($model, 'LOCALITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KEY_STATE')->textInput() ?>

    <?= $form->field($model, 'KEY_MUN')-> textInput() ?>

    <?= !$model->isNewRecord ? $form->field($model, 'SEC_ID')->widget(DepDrop::classname(), [
        'options' => ['id'=>'sec_id'],
        'type'=>DepDrop::TYPE_SELECT2,
        'data'=>[$model->SEC_ID=>$model->SEC_ID],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
                'depends'=>['mun_id'],
                'url' => Url::to(['applicants/sections']),
        ]
    ]) : $form->field($model, 'SEC_ID')->widget(DepDrop::classname(), [
        'options' => ['id'=>'sec_id'],
        'type'=>DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['mun_id'],
            'url' => Url::to(['applicants/sections']),
        ]
    ]) ?>

    <?= $form->field($model, 'POSTAL_CODE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>