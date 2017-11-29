<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Nacionalidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nationalities-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'NAME_NATIONALITIES',
        ],
    ]); ?>
<?php Pjax::end(); ?></div>