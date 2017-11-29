<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CivilStatus */

$this->title = 'Update Civil Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Civil Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="civil-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
