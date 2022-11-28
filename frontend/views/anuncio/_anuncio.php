<?php

use yii\helpers\Html;

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<tr>
    <td class="pl-4"><?= $model->id ?></td>
    <td>
        <h5 class="font-medium mb-0"><?= $model->id_Empresa ?></h5>
    </td>
    <td>
        <span class="text-muted" id="descricao"><?= $model->titulo ?></span><br>
    </td>
    <td>
        <span class="text-muted"><?= $model->descricao ?></span><br>
    </td>
    <td>
        <span class="text-muted"><?= $model->perfil_procurado ?></span>
    </td>
    <td>
        <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-eye"></i></i>', ['empresa/view', 'id' => $model->id], ['class' => 'settings','title'=>'Mais Informações', 'data-toggle'=>'tooltip']); ?>
        <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-edit"></i></i>', ['empresa/update', 'id' => $model->id], ['class' => 'settings','title'=>'Editar utilizador', 'data-toggle'=>'tooltip']); ?>
        <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-trash"></i></i>', ['empresa/delete', 'id' => $model->id], ['class' => 'delete','title'=>'Apagar','data' => ['method' => 'post'], 'data-toggle'=>'tooltip']); ?>
    </td>
</tr>
