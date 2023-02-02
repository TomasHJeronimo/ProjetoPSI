<?php

use common\models\Anuncio;
use common\models\Empresa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ofertas';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/jquery.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?= Html::cssFile('@web/css/bootstrap.min.css') ?>
<?= Html::jsFile('@web/js/bootstrap.min.js') ?>

<div class="anuncio-index">

<div class="container-fluid">

    <style>
        .card {
            display: inline-block;
            width: 300px;
            height: 400px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
            text-align: left;
            border-radius: 10px;
            overflow: hidden;
        }

        .card h2 {
            font-size: 22px;
            margin: 20px;
        }

        .card p {
            font-size: 14px;
            margin: 20px;
            text-align: left;
        }

        .card button {
            background-color: #0077B5;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            margin: 20px;
            cursor: pointer;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card .card-footer .btn {
            margin-left: auto;
        }
        #card-text{
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical
        }
        hr{
            border-top: 1px solid black;
        }

        /* Modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            border: 1px solid #888;
            width: 100%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;

    </style>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        $query = Empresa::find()->where(['idAdmin' => \Yii::$app->user->id])->count();

        if ($query > 0) {
            ?>
            <?= Html::a('Nova Oferta', ['create'], ['class' => 'btn btn-success']) ?>
            <?php
        }

        ?>


    </p>


   <div class="card-group">
       <?php foreach ($anuncios as $anuncio) : ?>
        <div class="card">
            <img src="https://static.pexels.com/photos/9050/pexels-photo.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $anuncio->titulo ?></h5>
            </div>
            <div class="card-footer">
                <small class="text-muted"><?php foreach ($categorias as $categoria):

                    if ($categoria->id == $anuncio->categoria){
                        ?>

                    <?= $categoria->Nome ?>

                    <?php
                    }
                    endforeach;
                    ?></small>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-<?php $anuncio->id ?>">
                    Ver mais...
                </button>

            </div>
        </div>
       <?php endforeach; ?>

    </div>

    <div class="modal fade" id="modal-<?php $anuncio->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php $anuncio->id ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-label-<?php $anuncio->id ?>"><?= $anuncio->titulo ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6><strong><u>Descrição:</u></strong></h6>
                    <p><?= $anuncio->descricao ?></p>
                    <hr>
                    <h6><strong><u>Perfil Procurado:</u></strong></h6>
                    <p><?= $anuncio->perfil_procurado ?></p>
                </div>
                <div class="modal-footer">
                    <?= Html::a('Ir para a página', ['anuncio/view', 'id' => $anuncio->id], ['class' => 'btn btn-success', 'id' => 'btnNova']) ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</div>
