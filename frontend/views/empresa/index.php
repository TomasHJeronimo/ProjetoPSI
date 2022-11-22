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
        <?= Html::a('Create Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idAdmin',
            'Nome',
            'descricao',
            'contactoTelefone',
            'contactoTelemovel',
            'morada',
            'email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Empresa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

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
                                <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Descrição</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Telefone</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Telemóvel</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Morada</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="pl-4">1</td>
                                <td>
                                    <h5 class="font-medium mb-0">Nome da Empresa 1</h5>
                                </td>
                                <td>
                                    <span class="text-muted">Descrição da Empresa</span><br>
                                </td>
                                <td>
                                    <span class="text-muted">918782326</span><br>
                                </td>
                                <td>
                                    <span class="text-muted">261121212</span>
                                </td>
                                <td>
                                    <span class="text-muted">email@email.pt</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-search"></i> </button>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
