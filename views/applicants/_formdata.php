<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HOMEDATA */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homedata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput() ?>

    <?= $form->field($model, 'STREET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INTERIOR_NUMBER')->textInput() ?>

    <?= $form->field($model, 'EXTERIOR_NUMBER')->textInput() ?>

    <?= $form->field($model, 'BETWEEN_STREET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AND_STREET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OTHER_REFERENCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MUN_ID')->textInput() ?>

    <?= $form->field($model, 'LOCALITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KEY_STATE')->textInput() ?>

    <?= $form->field($model, 'KEY_MUN')->textInput() ?>

    <?= $form->field($model, 'SEC_ID')->textInput() ?>

    <?= $form->field($model, 'POSTAL_CODE')->textInput() ?>

    <?= $form->field($model, 'APPLICANTS_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>