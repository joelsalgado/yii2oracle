<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BirthEntity */

$this->title = 'Update Birth Entity: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Birth Entities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="birth-entity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
