
<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Birth Entity');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Birth Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="birth-entity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>