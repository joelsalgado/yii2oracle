<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HOMEDATA */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Homedatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homedata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'STREET',
            'INTERIOR_NUMBER',
            'EXTERIOR_NUMBER',
            'BETWEEN_STREET',
            'AND_STREET',
            'OTHER_REFERENCE',
            'MUN_ID',
            'LOCALITY',
            'KEY_STATE',
            'KEY_MUN',
            'SEC_ID',
            'POSTAL_CODE',
            'APPLICANTS_ID',
        ],
    ]) ?>

</div>
