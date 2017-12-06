<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="homedata-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>