<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BirthEntity */

$this->title = 'Create Birth Entity';
$this->params['breadcrumbs'][] = ['label' => 'Birth Entities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="birth-entity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
