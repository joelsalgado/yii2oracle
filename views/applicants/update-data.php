
<?php

use yii\helpers\Html;

$this->title = 'Actualizar Solicitante: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Homedatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="homedata-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_formdata', [
        'model' => $model,
    ]) ?> 
</div>