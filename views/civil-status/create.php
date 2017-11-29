<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CivilStatus */

$this->title = 'Create Civil Status';
$this->params['breadcrumbs'][] = ['label' => 'Civil Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="civil-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>