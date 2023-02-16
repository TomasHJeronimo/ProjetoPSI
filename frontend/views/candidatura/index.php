<?php

use common\models\Candidatura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CandidaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Candidaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidatura-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="container-fluid">
        <h2 class="page-title">Minhas Candidaturas</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Nome da Empresa</th>
                <th>Data da Candidatura</th>
                <th>Acções</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($candidaturas as $candidatura) :

                $anuncioCandidatura = \common\models\Anuncio::find()->where(['id' => $candidatura->id_anuncio])->one();

                $anuncioEmpresa = \common\models\Empresa::find()->where(['id' => $anuncioCandidatura->id_Empresa])->one();

            ?>
            <tr>

                <td><?= $anuncioCandidatura->titulo ?></td>
                <td><?= $anuncioEmpresa->Nome ?></td>
                <td><?= $candidatura->data_candidatura ?></td>
                <td>
                    <?= Html::a('<i class="btn btn-danger">Desistir</i>', ['candidatura/delete', 'id' => $candidatura->id], [
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

    <style>

        .page-title {
            font-size: 36px;
            margin-bottom: 30px;
        }
    </style>
</div>
