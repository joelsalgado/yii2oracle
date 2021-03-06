<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Applicants */

$this->title = 'Actualizar Solicitante: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Solicitante', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio', 'url' => ['folio']];
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['menu', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="applicants-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>