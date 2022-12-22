<?php

use common\models\Empresa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\EmpresaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <style>
        @media (min-width: 1200px)
            .container, .container-sm, .container-md, .container-lg, .container-xl {
                max-width: 1720px !important;
            }
    </style>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
        #descricao{
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Minhas Empresas</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Nome</th>
                                <th scope="col" class="border-0 text-uppercase font-medium" style="width: 30%">Descrição</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Telefone</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Telemóvel</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Morada</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Gestão</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($empresas as $empresa): ?>
                            <tr>
                                <td class="pl-4"><?= $empresa->id ?></td>
                                <td>
                                    <h5 class="font-medium mb-0"><?= $empresa->Nome ?></h5>
                                </td>
                                <td>
                                    <span class="text-muted" id="descricao"><?= $empresa->descricao ?></span><br>
                                </td>
                                <td>
                                    <span class="text-muted"><?= $empresa->contactoTelefone ?></span><br>
                                </td>
                                <td>
                                    <span class="text-muted"><?= $empresa->contactoTelemovel ?></span>
                                </td>
                                <td>
                                    <span class="text-muted"><?= $empresa->email ?></span>
                                </td>
                                <td>
                                    <span class="text-muted"><?= $empresa->morada ?></span>
                                </td>
                                <td>
                                    <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-eye"></i></i>', ['empresa/view', 'id' => $empresa->id], ['class' => 'settings','title'=>'Mais Informações', 'data-toggle'=>'tooltip']); ?>
                                    <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-edit"></i></i>', ['empresa/update', 'id' => $empresa->id], ['class' => 'settings','title'=>'Editar utilizador', 'data-toggle'=>'tooltip']); ?>
                                    <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-trash"></i></i>', ['empresa/delete', 'id' => $empresa->id], [
                                        'class' => 'delete',
                                        'title'=>'Apagar',
                                        'data' => [
                                            'confirm' => 'Tem a certeza que quer apagar esta empresa?',
                                            'method' => 'post',
                                        ],
                                        'data-toggle'=>'tooltip',
                                    ]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
