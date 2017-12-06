<?php

use yii\helpers\Html;

$this->title = 'Crear Solicitante';
$this->params['breadcrumbs'][] = ['label' => 'Solicitante', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio', 'url' => ['folio']];
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['menu', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="applicants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>