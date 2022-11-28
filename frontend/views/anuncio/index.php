<?php

use common\models\Anuncio;
use common\models\Empresa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ofertas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncio-index">


    <div class="container-fluid">

        <style>
            .tile {
                background-color: white;
                width: 100%; /* You can change the size however you like. */
                height: 15em;
                margin: 1em;
                overflow: hidden;
                border-radius: 10px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.4);
            }

            .tile-img {
                background-size: cover;
                background-position: center center;
                background-repeat: none;
                width: 15em;
                height: inherit;
                float: left;
            }

            .tile-info {
                height: inherit;
                padding: 1em;
                margin-left: 15em;
            }

            /* These are optional changes I make to my css. */

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            p {
                font-family: sans-serif;
                color: #777;
            }

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

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>


        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_anuncio',
        ]); ?>


    </div>



