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

        .picZoomer-pic-wp:hover .picZoomer-cursor {
            display: block;
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

        .piclist li {
            display: inline-block;
            width: 90px;
            height: 114px;
            border: 1px solid #eee;
        }

        .piclist li img {
            width: 97%;
            height: auto;
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

        .row-sm .col-md-6 {
            padding-left: 5px;
            padding-right: 5px;
        }

        /*===pic-Zoom===*/
        ._boxzoom .zoom-thumb {
            width: 90px;
            display: inline-block;
            vertical-align: top;
            margin-top: 0px;
        }

        ._boxzoom .zoom-thumb ul.piclist {
            padding-left: 0px;
            top: 0px;
        }

        ._boxzoom ._product-images {
            width: 80%;
            display: inline-block;
        }

        ._boxzoom ._product-images .picZoomer {
            width: 100%;
        }

        ._boxzoom ._product-images .picZoomer .picZoomer-pic-wp img {
            left: 0px;
        }

        ._boxzoom ._product-images .picZoomer img.my_img {
            width: 100%;
        }

        .piclist li img {
            height: 100px;
            object-fit: cover;
        }


        ._product-detail-content {
            background: #fff;
            padding: 15px;
            border: 1px solid lightgray;
        }

        ._product-detail-content p._p-name {
            color: black;
            font-size: 20px;
            border-bottom: 1px solid lightgray;
            padding-bottom: 12px;
        }

        .p-list span {
            margin-right: 15px;
        }

        .p-list span.price {
            font-size: 25px;
            color: #318234;
        }

        ._p-qty > span {
            color: black;
            margin-right: 15px;
            font-weight: 500;
        }

        ._p-qty .value-button {
            display: inline-flex;
            border: 0px solid #ddd;
            margin: 0px;
            width: 30px;
            height: 35px;
            justify-content: center;
            align-items: center;
            background: #fd7f34;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #fff;
        }

        ._p-qty .value-button {
            border: 0px solid #fe0000;
            height: 35px;
            font-size: 20px;
            font-weight: bold;
        }

        ._p-qty input#number {
            text-align: center;
            border: none;
            border-top: 1px solid #fe0000;
            border-bottom: 1px solid #fe0000;
            margin: 0px;
            width: 50px;
            height: 35px;
            font-size: 14px;
            box-sizing: border-box;
        }

        ._p-add-cart {
            margin-left: 0px;
            margin-bottom: 15px;
        }

        .p-list {
            margin-bottom: 10px;
        }

        ._p-features > span {
            display: block;
            font-size: 16px;
            color: #000;
            font-weight: 500;
        }

        ._p-add-cart .buy-btn {
            background-color: #fd7f34;
            color: #fff;
        }

        ._p-add-cart .btn {
            text-transform: capitalize;
            padding: 6px 20px;
            /* width: 200px; */
            border-radius: 52px;
        }

        ._p-add-cart .btn {
            margin: 0px 8px;
        }

        /*=========Recent-post==========*/
        .title_bx h3.title {
            font-size: 22px;
            text-transform: capitalize;
            position: relative;
            color: #fd7f34;
            font-weight: 700;
            line-height: 1.2em;
        }

        .title_bx h3.title:before {
            content: "";
            height: 2px;
            width: 20%;
            position: absolute;
            left: 0px;
            z-index: 1;
            top: 40px;
            background-color: #fd7f34;
        }

        .title_bx h3.title:after {
            content: "";
            height: 2px;
            width: 100%;
            position: absolute;
            left: 0px;
            top: 40px;
            background-color: #ffc107;
        }

        .common_wd .owl-nav .owl-prev, .common_wd .owl-nav .owl-next {
            background-color: #fd7f34 !important;
            display: block;
            height: 30px;
            width: 30px;
            text-align: center;
            border-radius: 0px !important;
        }

        .owl-nav .owl-next {
            right: -10px;
        }

        .owl-nav .owl-prev, .owl-nav .owl-next {
            top: 50%;
            position: absolute;
        }

        .common_wd .owl-nav .owl-prev i, .common_wd .owl-nav .owl-next i {
            color: #fff;
            font-size: 14px !important;
            position: relative;
            top: -1px;
        }

        .common_wd .owl-nav {
            position: absolute;
            top: -21%;
            right: 4px;
            width: 65px;
        }

        .owl-nav .owl-prev i, .owl-nav .owl-next i {
            left: 0px;
        }

        ._p-qty .decrease_ {
            position: relative;
            right: -5px;
            top: 3px;
        }

        ._p-qty .increase_ {
            position: relative;
            top: 3px;
            left: -5px;
        }

        /*========box========*/
        .sq_box {
            padding-bottom: 5px;
            border-bottom: solid 2px #fd7f34;
            background-color: #fff;
            text-align: center;
            padding: 15px 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .item .sq_box span.wishlist {
            right: 5px !important;
        }

        .sq_box span.wishlist {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .sq_box span {
            font-size: 14px;
            font-weight: 600;
            margin: 0px 10px;
        }

        .sq_box span.wishlist i {
            color: #adb5bd;
            font-size: 20px;
        }

        .sq_box h4 {
            font-size: 18px;
            text-align: center;
            font-weight: 500;
            color: #343a40;
            margin-top: 10px;
            margin-bottom: 10px !important;
        }

        .sq_box .price-box {
            margin-bottom: 15px !important;
        }

        .sq_box .btn {
            border-radius: 50px;
            padding: 5px 13px;
            font-size: 15px;
            color: #fff;
            background-color: #fd7f34;
            font-weight: 600;
        }

        .sq_box .price-box span.price {
            text-decoration: line-through;
            color: #6c757d;
        }

        .sq_box span {
            font-size: 14px;
            font-weight: 600;
            margin: 0px 10px;
        }

        .sq_box .price-box span.offer-price {
            color: #28a745;
        }

        .sq_box img {
            object-fit: cover;
            height: 150px !important;
            margin-top: 20px;
        }

        .sq_box span.wishlist i:hover {
            color: #fd7f34;
        }
    </style>

    <section id="services" class="services section-bg">
        <div class="container-fluid">
            <div class="col-sm-12 text-center mb-4">
                <?= Html::a('<span class="fa fa-arrow-left"></span>Voltar atrás', ['anuncio/index'], ['class' => 'btn btn-danger']) ?>
            </div>
            <div class="row row-sm">
                <div class="col-md-4 _boxzoom">
                    <div class="zoom-thumb">

                    </div>
                    <div class="_product-images">
                        <div>
                            <img class="my_img" src="https://static.pexels.com/photos/9050/pexels-photo.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="_product-detail-content">
                        <p class="_p-name"> <?= $model->titulo ?> </p>
                        <div class="_p-price-box">
                            <div class="_p-features">
                                <h2><u>Empresa </u></h2>
                                <?php

                                foreach ($empresas as $empresa) {
                                    if ($empresa->id == $model->id_Empresa) {
                                        ?>

                                        <?= Html::a($empresa->Nome, ['empresa/view', 'id' => $empresa->id]) ?>

                                        <?php
                                    }
                                }
                                ?>
                                <hr>
                            </div>

                            <div class="_p-features">
                                <h2><u>Job Description </u></h2>
                                <?= $model->descricao ?>
                            </div>
                            <ul class="spe_ul"></ul>

                            <div class="_p-features">
                                <h2><u>Perfil-Procurado </u></h2>
                                <?= $model->perfil_procurado ?>
                            </div>
                            <ul class="spe_ul"></ul>
                            <div class="_p-qty-and-cart">
                                <div class="_p-add-cart">


                                    <?php
                                    if (!Yii::$app->user->isGuest) {
                                        ?>

                                        <?= Html::a('<span class="fa fa-star-o"></span> Adicionar aos favoritos', ['view', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
                                        <?= Html::a('Candidatar-me', ['candidatura/create', 'anuncio' => $model->id], ['class' => 'btn btn-success']) ?>
                                        <?php
                                    }
                                    else{


                                    ?>
                                    <p style="color: red">Faça Login para se candidatar a uma oferta</p>
                                    <?= Html::a('Login', ['site/login'], ['class' => 'btn btn-success']) ?>
                                    <?= Html::a('Registo', ['site/signup'], ['class' => 'btn btn-primary']) ?>
                                    <?php

                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
