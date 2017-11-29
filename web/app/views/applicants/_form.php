<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Applicants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applicants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CURP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lada_celphone')->textInput() ?>

    <?= $form->field($model, 'celphone')->textInput() ?>

    <?= $form->field($model, 'lada_phone')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'birh_entity_id')->textInput() ?>

    <?= $form->field($model, 'civil_status_id')->textInput() ?>

    <?= $form->field($model, 'nationality_id')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
