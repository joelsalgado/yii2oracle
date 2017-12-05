<div class="page-header">
    <table class="table">
        <tr>
            <td><img class="rounded float-left" src="http://japem.edomex.gob.mx/sites/japem.edomex.gob.mx/files/images/EDOMEX_OK-01(1).png" height="54" width="81"> </td>
            <td align="right"><img style="text-align:right" src="https://seeklogo.com/images/G/gobierno-del-estado-de-mexico-en-grande-logo-FE81DB6908-seeklogo.com.png" height="54" width="81"></td>
        </tr>
    </table>

    <h4 align="center">FORMATO UNICO DE REGISTRO</h4>
    <h5 align="center">PROGRAMA DE DESARROLLO SOCIAL GENTE EN GRANDE</h5>
</div>

<div class="alert alert-danger">
    <p style="text-align: center">DATOS PERSONALES DE(LA) SOLICITANTE</p>
</div>

<table class="table">
    <tbody>
    <tr>
        <td class="active"><strong>Apellido Paterno</strong></td>
        <td><?= $model->last_name ?></td>
        <td class="active"><strong>Sexo</strong></td>
        <td><?= $model->gender ?></td>
    </tr>
    <tr>
        <td class="active"><strong>Apellido Materno</strong></td>
        <td><?= $model->last_name2 ?></td>
        <td class="active"><strong>Fecha de Nacimiento</strong></td>
        <td><?= $model->date ?></td>
    </tr>
    <tr>
        <td class="active"><strong>Nombre</strong></td>
        <td><?= $model->name ?></td>
        <td class="active"><strong>Entidad de Nacimiento</strong></td>
        <td><?= $model->entity->name_entity ?></td>
    </tr>
    <tr>
        <td class="active"><strong>CURP</strong></td>
        <td><?= $model->CURP ?></td>
        <td class="active"><strong>Estado Civil</strong></td>
        <td><?= $model->civil->name_civil_status ?></td>
    </tr>
    <tr>
        <td class="active"><strong>Celular</strong></td>
        <td><?= $model->lada_celphone ?>-<?= $model->celphone ?></td>
        <td class="active"><strong>Nacionalidad</strong></td>
        <td><?= $model->nationalily->NAME_NATIONALITIES ?></td>
    </tr>
    <tr>
        <td class="active"><strong>Telefono</strong></td>
        <td><?= $model->lada_phone ?>-<?= $model->phone ?></td>
        <td class="active"><strong>Email</strong></td>
        <td><?= $model->email ?></td>
    </tr>
    </tbody>
</table>

<div class="alert alert-danger">
    <p style="text-align: center">DOCUMENTOS CONFORME A LAS REGLAS DE OPERACION</p>
</div>

<div id="showBarcode"></div>
<?php
use barcode\barcode\BarcodeGenerator;
$optionsArray = array(
    'elementId'=> 'showBarcode',
    'value'=> '12345678',
    'type'=>'code128',
);
echo BarcodeGenerator::widget($optionsArray);
?>