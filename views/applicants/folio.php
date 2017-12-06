<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Folio';
$this->params['breadcrumbs'][] = ['label' => 'Solicitante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<?= Html::beginForm(
    Url::toRoute("applicants/menu"),//action
    "get",//method
    ['class' => 'form-inline']//options
);
?>

    <div class="form-group">
        <?= Html::label("Folio", "folio") ?>
        <?= Html::textInput("id", null, ["class" => "form-control", 'required' => true]) ?>
    </div>

<?= Html::submitInput("Enviar", ["class" => "btn btn-success"]) ?>

<?= Html::endForm() ?>