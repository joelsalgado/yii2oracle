<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApplicantsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applicants-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'last_name2') ?>

    <?= $form->field($model, 'CURP') ?>

    <?php // echo $form->field($model, 'lada_celphone') ?>

    <?php // echo $form->field($model, 'celphone') ?>

    <?php // echo $form->field($model, 'lada_phone') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'birh_entity_id') ?>

    <?php // echo $form->field($model, 'civil_status_id') ?>

    <?php // echo $form->field($model, 'nationality_id') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
