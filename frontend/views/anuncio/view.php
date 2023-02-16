<?php

use richardfan\widget\JSRegister;
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


        .form-control {
            border: 2px solid #e8ebed;
            border-radius: 2px;
            box-shadow: none;
            height: 37px;
            padding: 8px 12px 9px 12px;
        }


        .my_img {
            vertical-align: top;
            position: flex;
            top: 0;
            bottom: 0;
            margin: auto;
            height: 100%;
            max-height: 624px !important;
        }

        /* custom style */
        .picZoomer-pic-wp,
        .picZoomer-zoom-wp {
            border: 1px solid #eee;
        }


        .section-bg {
            background-color: #F0F3F3;
        }

        section {
            padding: 60px 0;
        }


        h2, h4 {
            margin-bottom: 30px;
        }

        hr {
            border: 1px solid #ddd;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .job-offer-image {
            background-image: url(image-url);
            background-size: cover;
            height: 300px;
        }

        .job-offer-details {
            padding: 30px;
        }

        .job-offer-title {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .company-name {
            font-size: 24px;
            color: gray;
            margin-bottom: 20px;
        }

        .job-description {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .features-needed {
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .features-list {
            list-style: none;
            margin-bottom: 20px;
            padding-left: 0;
        }

        .submit-application {
            display: block;
            margin: 0 auto;
        }

    </style>

    <section id="services" class="services section-bg">
        <div class="container-fluid">
            <div class="row row-sm">
                <div class="col-md-4 _boxzoom">
                    <div class="zoom-thumb">

                    </div>
                    <div class="job-offer-image">
                        <div>
                            <img class="my_img" src="https://static.pexels.com/photos/9050/pexels-photo.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="_product-detail-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="text-center"><b><i><u><?= $model->titulo ?></u></i></b></h2>
                                    <h4 class="text-center">Empresa: <b><i><?php

                                                foreach ($empresas as $empresa) :

                                                    if ($model->id_Empresa == $empresa->id) {
                                                        ?>

                                                        <?= Html::a($empresa->Nome, ['empresa/view', 'id' => $empresa->id], ['class' => 'settings', 'title' => 'Mais Informações', 'data-toggle' => 'tooltip']); ?>

                                                        <?php
                                                    }

                                                endforeach;

                                                ?></i></b></h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5><u>Job Description:</u></h5>
                                    <p><?= $model->descricao ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5><u>Perfil Procurado:</u></h5>
                                    <p><?= $model->perfil_procurado ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?= Html::a('Enviar Candidatura', ['candidatura/create', 'id' => $model->id], ['class' => 'btn btn-success', 'title' => 'Mais Informações', 'data-toggle' => 'tooltip']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
