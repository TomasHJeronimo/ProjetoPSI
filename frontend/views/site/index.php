<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Carousel;
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\helpers\Html;

$this->title = 'HuntingJob';
?>
<div class="site-index">

    <div class="container-fluid">

        <style>
            html, body, main {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }

            #carousel {
                position: relative;
                height: 400px;
                top: 50%;
                transform: translateY(-50%);
                overflow: hidden;
            }

            #carousel div {
                position: absolute;
                transition: transform 400ms, left 400ms, opacity 400ms, z-index 0s;
                opacity: 1;
            }

            #carousel div img {
                width: 400px;
                transition: width 400ms;
                -webkit-user-drag: none;
            }

            #carousel div.hideLeft {
                left: 0%;
                opacity: 0;
                transform: translateY(50%) translateX(-50%);
            }

            #carousel div.hideLeft img {
                width: 200px;
            }

            #carousel div.hideRight {
                left: 100%;
                opacity: 0;
                transform: translateY(50%) translateX(-50%);
            }

            #carousel div.hideRight img {
                width: 200px;
            }

            #carousel div.prev {
                z-index: 5;
                left: 30%;
                transform: translateY(50px) translateX(-50%);
            }

            #carousel img:hover {
                cursor:
            }

            #carousel div.prev img {
                width: 300px;
            }

            #carousel div.prevLeftSecond {
                z-index: 4;
                left: 15%;
                transform: translateY(50%) translateX(-50%);
                opacity: 0.7;
            }

            #carousel div.prevLeftSecond img {
                width: 200px;
            }

            #carousel div.selected {
                z-index: 10;
                left: 50%;
                transform: translateY(0px) translateX(-50%);
            }

            #carousel div.next {
                z-index: 5;
                left: 70%;
                transform: translateY(50px) translateX(-50%);
            }

            #carousel div.next img {
                width: 300px;
            }

            #carousel div.nextRightSecond {
                z-index: 4;
                left: 85%;
                transform: translateY(50%) translateX(-50%);
                opacity: 0.7;
            }

            #carousel div.nextRightSecond img {
                width: 200px;
            }

            .buttons {
                position: fixed;
                left: 50%;
                transform: translateX(-50%);
                bottom: 10px;
            }
            #descricao{
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical
            }
        </style>


        <div class="jumbotron text-center bg-transparent">
            <h1 class="display-4">Bem vindo!</h1>
            <p class="lead">Começa a procurar ofertas de empregos de várias categorias.</p>
            <?= Html::a('Ver Todos os Anuncios...', ['index'], ['class' => 'btn btn-primary']) ?>
        </div>

        <?php

        OwlCarouselWidget::begin([
            'container' => 'div',
            'containerOptions' => [
                'id' => 'container-id',
                'class' => 'container-class'
            ],
            'pluginOptions' => [
                'autoplay' => true,
                'autoplayTimeout' => 10000,
                'items' => 4,
                'loop' => true,
                'itemsDesktop' => [1199, 3],
                'itemsDesktopSmall' => [979, 3]
            ]
        ]);
        ?>

        <?php
        foreach ($empresas as $empresa):
            ?>
            <div class="item-class">
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="course_card">
                        <div class="course_card_img"><img
                                    src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjExNzczfQ"
                                    alt="course"/></div>
                        <div class="course_card_content">
                            <h3 class="title"><?= $empresa->Nome ?></h3>
                        </div>
                        <div class="course_card_footer">
                            <?= Html::a('Ver mais...', ['empresa/view', 'id' => $empresa->id], ['class' => 'settings','title'=>'Mais Informações', 'data-toggle'=>'tooltip']); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        <?php OwlCarouselWidget::end(); ?>




        <style>
            @import url("https://fonts.googleapis.com/css?family=Nunito+Sans");

            body {
                margin: 0;
                padding: 0;
            }

            .row {
                margin: 0 0 !important;
            }

            .course_card {
                margin: 25px 10px;
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                transition: 0.25s ease-in-out;
            }

            .course_card_img {
                max-height: 100%;
                max-width: 100%;
            }

            .course_card_img img {
                height: 250px;
                width: 100%;
                transition: 0.25s all;
            }

            .course_card_img img:hover {
                transform: translateY(-3%);
            }

            .course_card_content {
                padding: 16px;
            }

            .course_card_content h3 {
                font-family: nunito sans;
                font-family: 18px;
            }

            .course_card_content p {
                font-family: nunito sans;
                text-align: justify;
            }

            .course_card_footer {
                padding: 10px 0px;
                margin: 16px;
            }

            .course_card_footer a {
                text-decoration: none;
                font-family: nunito sans;
                margin: 0 10px 0 0;
                text-transform: uppercase;
                color: #f96332;
                padding: 10px;
                font-size: 14px;
            }

            .course_card:hover {
                transform: scale(1.025);
                border-radius: 0.375rem;
                box-shadow: 0 0 2rem rgba(0, 0, 0, 0.25);
            }

            .course_card:hover .course_card_img img {
                border-top-left-radius: 0.375rem;
                border-top-right-radius: 0.375rem;
            }
        </style>


    </div>
