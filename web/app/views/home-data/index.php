<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homedatas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homedata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Homedata', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'STREET',
            'INTERIOR_NUMBER',
            'EXTERIOR_NUMBER',
            'BETWEEN_STREET',
            // 'AND_STREET',
            // 'OTHER_REFERENCE',
            // 'MUN_ID',
            // 'LOCALITY',
            // 'KEY_STATE',
            // 'KEY_MUN',
            // 'SEC_ID',
            // 'POSTAL_CODE',
            // 'APPLICANTS_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
