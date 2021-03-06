<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Applicants */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Applicants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applicants-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'last_name',
            'last_name2',
            'CURP',
            'lada_celphone',
            'celphone',
            'lada_phone',
            'phone',
            'gender',
            'date',
            'birh_entity_id',
            'civil_status_id',
            'nationality_id',
            'email:email',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
