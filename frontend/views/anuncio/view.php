<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\controllers\AnuncioController;

/** @var yii\web\View $this */
/** @var common\models\Anuncio $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anuncio-view">

    <p>
        <?php
        if ($this->context->isUserAuthor()) {
            ?>

            <h1><u>Gestão Admin</u></h1>



            <?= Html::a('Atualizar Oferta', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Apagar Oferta', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php

        }
        ?>
    </p>
    <hr>

    <style>
        body {
            color: #565656;
            background: #F0F3F3;
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
            font-size: 100%;
            padding: 0px;
            margin: 0px;
            min-height: 100%;
            position: relative;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            margin-top: 20px;
        }

        .panel {
            border: none;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            -o-border-radius: 0;
            border-radius: 0;
        }

        .panel-body {
            padding: 15px;
        }

        .profile-pic {
            margin: 20px 0 0 0;
        }

        .profile-pic img {
            border: 7px solid #e5e6ea;
        }

        img {
            max-width: 100%;
        }

        h1, .h1 {
            font-size: 36px;
        }

        p {
            font-size: 12px;
        }

        .profile-info .connect {
            margin: 15px 0 5px 0;
        }

        .profile-info .connect button {
            margin-right: 15px;
        }

        .btn-success.btn-trans {
            color: #27b6af;
            background-color: transparent;
            border: solid thin #27b6af;
        }

        .btn-primary.btn-trans {
            color: #556b8d;
            background-color: transparent;
            border: solid thin #556b8d;
        }

        .social {
            margin: 0;
            padding: 0;
        }

        .social ul {
            margin: 0;
            padding: 5px;
        }

        .social ul li {
            margin: 5px;
            list-style: none outside none;
            display: inline-block;
        }

        .social i {
            width: 40px;
            height: 40px;
            color: #FFF;
            background-color: #909AA0;
            font-size: 22px;
            text-align: center;
            padding-top: 12px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            -o-border-radius: 50%;
            transition: all ease 0.3s;
            -moz-transition: all ease 0.3s;
            -webkit-transition: all ease 0.3s;
            -o-transition: all ease 0.3s;
            -ms-transition: all ease 0.3s;
        }

        .timeline-post-to textarea {
            min-height: 80px;
            margin-bottom: 15px;
        }

        .form-control {
            border: 2px solid #e8ebed;
            border-radius: 2px;
            box-shadow: none;
            height: 37px;
            padding: 8px 12px 9px 12px;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container-fluid bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-7">
                <section class="panel">
                    <div class="panel-body profile-wrapper">

                        <div class="col-md-9">
                            <div class="profile-info">
                                <h1><?= $model->titulo ?></h1>
                                <span class="text-muted"><?php

                                    foreach ($empresas as $empresa) {
                                        if ($empresa->id == $model->id_Empresa) {
                                            ?>

                                            <b><u>Empresa:</u></b> <?= Html::a($empresa->Nome, ['empresa/view', 'id' => $empresa->id]) ?>

                                            <?php
                                        }
                                    }
                                    ?>
                                </span>
                                <hr>
                                <h1>Descrição</h1>
                                <p>
                                    <?= $model->descricao ?>
                                </p>
                                <hr>
                                <h1>Perfil Procurado</h1>
                                <p><?= $model->perfil_procurado ?></p>
                                <div class="connect">
                                    <?= Html::a('<span class="fa fa-star-o"></span> Adicionar aos Favoritos', ['view', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
                                    <?= Html::a('<span class="fa fa-check"></span> Candidatar-me', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</div>
