<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplicantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applicants-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Solicitante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            'id',
            'name',
            'last_name',
            'last_name2',
            'CURP',
            // 'lada_celphone',
            // 'celphone',
            // 'lada_phone',
            // 'phone',
            // 'gender',
            // 'date',
            // 'birh_entity_id',
            // 'civil_status_id',
            // 'nationality_id',
            // 'email:email',
            // 'created_at',
            // 'updated_at',


            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'report' => function ($model) {
                        return Html::a ( '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> ', $model );
                    },
                ],
                'template' => '{update} {view} {delete} {report}'


            ],

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
