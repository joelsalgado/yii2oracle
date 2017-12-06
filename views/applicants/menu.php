<?php
use yii\helpers\Html;
$this->title = 'Menu';
$this->params['breadcrumbs'][] = ['label' => 'Solicitante', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Folio', 'url' => ['folio']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php if($status == 0): ?>
    <a href="/applicants/create?id=<?= $id ?>">
        <label style="font-size: 20px"><span class=" label label-danger">Datos Personales <span class="glyphicon glyphicon-remove"></span> </span></label>
    </a>
<?php else: ?>
    <a href="/applicants/update?id=<?=$model->id?>">
        <label style="font-size: 20px"><span class=" label label-success">Datos Personales <span class="glyphicon glyphicon-ok"></span></span></label>
    </a>
<?php endif;?>