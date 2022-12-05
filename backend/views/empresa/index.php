<?php

use common\models\Empresa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\EmpresaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <style>

        body{
            background-color: #f8f9fa!important
        }
        .p-4 {
            padding: 1.5rem!important;
        }
        .mb-0, .my-0 {
            margin-bottom: 0!important;
        }
        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }
        }
        /* user-dashboard-info-box */
        .user-dashboard-info-box .candidates-list .thumb {
            margin-right: 20px;
        }
        .user-dashboard-info-box .candidates-list .thumb img {
            width: 80px;
            height: 80px;
            -o-object-fit: cover;
            object-fit: cover;
            overflow: hidden;
            border-radius: 50%;
        }

        .user-dashboard-info-box .title {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 30px 0;
        }

        .user-dashboard-info-box .candidates-list td {
            vertical-align: middle;
        }

        .user-dashboard-info-box td li {
            margin: 0 4px;
        }

        .user-dashboard-info-box .table thead th {
            border-bottom: none;
        }

        .table.manage-candidates-top th {
            border: 0;
        }

        .user-dashboard-info-box .candidate-list-favourite-time .candidate-list-favourite {
            margin-bottom: 10px;
        }

        .table.manage-candidates-top {
            min-width: 650px;
        }

        .user-dashboard-info-box .candidate-list-details ul {
            color: #969696;
        }

        /* Candidate List */
        .candidate-list {
            background: #ffffff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border-bottom: 1px solid #eeeeee;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 20px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .candidate-list:hover {
            -webkit-box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
            box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
            position: relative;
            z-index: 99;
        }
        .candidate-list:hover a.candidate-list-favourite {
            color: #e74c3c;
            -webkit-box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
            box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
        }

        .candidate-list .candidate-list-image {
            margin-right: 25px;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 80px;
            flex: 0 0 80px;
            border: none;
        }
        .candidate-list .candidate-list-image img {
            width: 80px;
            height: 80px;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .candidate-list-title {
            margin-bottom: 5px;
        }

        .candidate-list-details ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-bottom: 0px;
        }
        .candidate-list-details ul li {
            margin: 5px 10px 5px 0px;
            font-size: 13px;
        }

        .candidate-list .candidate-list-favourite-time {
            margin-left: auto;
            text-align: center;
            font-size: 13px;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
            flex: 0 0 90px;
        }
        .candidate-list .candidate-list-favourite-time span {
            display: block;
            margin: 0 auto;
        }
        .candidate-list .candidate-list-favourite-time .candidate-list-favourite {
            display: inline-block;
            position: relative;
            height: 40px;
            width: 40px;
            line-height: 40px;
            border: 1px solid #eeeeee;
            border-radius: 100%;
            text-align: center;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            margin-bottom: 20px;
            font-size: 16px;
            color: #646f79;
        }
        .candidate-list .candidate-list-favourite-time .candidate-list-favourite:hover {
            background: #ffffff;
            color: #e74c3c;
        }

        .candidate-banner .candidate-list:hover {
            position: inherit;
            -webkit-box-shadow: inherit;
            box-shadow: inherit;
            z-index: inherit;
        }

        .bg-white {
            background-color: #ffffff !important;
        }
        .p-4 {
            padding: 1.5rem!important;
        }
        .mb-0, .my-0 {
            margin-bottom: 0!important;
        }
        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }

        .user-dashboard-info-box .candidates-list .thumb {
            margin-right: 20px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Gestão de Empresas</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium pl-4">ID</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Nome</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Role</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Criado a</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">gerir</th>
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
                                        <span class="text-muted"> <?= $empresa->contactoTelefone ?> </span><br>
                                    </td>
                                    <td>
                                        <span class="text-muted"><?= $empresa->contactoTelemovel?></span><br>
                                    </td>
                                    <td>
                                        <span class="text-muted"><?= $empresa->morada ?></span><br>
                                    </td>
                                    <td>
                                        <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-eye"></i></i>', ['empresa/view', 'id' => $empresa->id], ['class' => 'settings','title'=>'Mais Informações', 'data-toggle'=>'tooltip']); ?>
                                        <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-edit"></i></i>', ['empresa/update', 'id' =>  $empresa->id], ['class' => 'settings','title'=>'Editar utilizador', 'data-toggle'=>'tooltip']); ?>
                                        <?= Html::a('<i class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-trash"></i></i>', ['empresa/delete', 'id' =>  $empresa->id], ['class' => 'delete','title'=>'Apagar','data' => ['method' => 'post'], 'data-toggle'=>'tooltip']); ?>
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
