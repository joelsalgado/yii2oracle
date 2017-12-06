<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HOMEDATA */

$this->title = 'Create Homedata';
$this->params['breadcrumbs'][] = ['label' => 'Homedatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homedata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formdata', [
        'model' => $model,
    ]) ?>

</div>