<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Applicants */

$this->title = 'Crear Solicitante';
$this->params['breadcrumbs'][] = ['label' => 'Solicitante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applicants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>