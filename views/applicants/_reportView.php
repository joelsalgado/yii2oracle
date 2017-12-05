<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>


<table id="customers">
    <tr>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Nombre(s)</th>
    </tr>
    <tr>
        <td><?= $model->last_name ?></td>
        <td><?= $model->last_name2 ?></td>
        <td><?= $model->name ?></td>0
    </tr>

    <tr>
        <th>Curp</th>
        <th>Celular</th>
        <th>Telefono</th>
    </tr>
    <tr>
        <td><?= $model->CURP ?></td>
        <td><?= $model->lada_celphone ?>-<?= $model->celphone ?></td>
        <td><?= $model->lada_phone ?>-<?= $model->phone ?></td>0
    </tr>

    <tr>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Entidad de Nacimiento</th>
    </tr>
    <tr>
        <td><?= $model->gender ?></td>
        <td><?= $model->date ?></td>
        <td><?= $model->entity->name_entity?></td>0
    </tr>

    <tr>
        <th>Estado Civil</th>
        <th>Naciolidad</th>
        <th>Correo electronico</th>
    </tr>
    <tr>
        <td><?= $model->civil->name_civil_status ?></td>
        <td><?= $model->nationalily->NAME_NATIONALITIES ?></td>
        <td><?= $model->email?></td>0
    </tr>


</table>