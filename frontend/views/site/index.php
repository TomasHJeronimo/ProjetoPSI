<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Carousel;
use kv4nt\owlcarousel\OwlCarouselWidget;

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
</style>



    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Bem vindo!</h1>
        <p class="lead">Começa a procurar ofertas de empregos de várias categorias.</p>
    </div>

    <?php

    OwlCarouselWidget::begin([
        'container' => 'div',
        'containerOptions' => [
            'id' => 'container-id',
            'class' => 'container-class'
        ],
        'pluginOptions'    => [
            'autoplay'          => true,
            'autoplayTimeout'   => 3000,
            'items'             => 3,
            'loop'              => true,
            'itemsDesktop'      => [1199, 3],
            'itemsDesktopSmall' => [979, 3]
        ]
    ]);
    ?>

    <div class="item-class">
        <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Image 1">
    </div>
    <div class="item-class"><img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Image 1"></div>
    <div class="item-class"><img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Image 1"></div>
    <div class="item-class"><img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Image 1"></div>


    <?php OwlCarouselWidget::end(); ?>




</div>