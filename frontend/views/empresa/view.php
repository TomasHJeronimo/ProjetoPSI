<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Empresa $model */

$this->title = $model->Nome;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">

    <style>
        /* Set the background color */
        body {
            background-color: #f2f2f2;
        }

        /* Create a container for the main content */
        .container {
            max-width: 1080px;
            margin: 0 auto;
        }

        /* Add a header section */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Add some styles for the company name */
        header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        /* Add some styles for the tagline */
        header p {
            font-size: 18px;
            margin-bottom: 0;
        }

        /* Add a section for the company information */
        .company-info {
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Add some styles for the company description */
        .company-info p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* Add a section for the company features */
        .features {
            padding: 40px;
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        /* Add some styles for the feature items */
        .features h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Add some styles for the feature descriptions */
        .features p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>

    <!-- Use the container to wrap the main content -->
    <div class="container-fluid" style="margin-top: 50px;">
        <!-- Add a header section -->
        <header>
            <h1><?= $model->Nome ?></h1>
            <p>
                <?php
                if (Yii::$app->getUser()->id == $model->idAdmin){
                    ?>
                            <?= Html::a('Atualizar Dados', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                            <?= Html::a('Apagar Empresa', ['delete', 'id' => $model->id], [
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
        </header>

        <!-- Add a section for the company information -->
        <div class="company-info">
            <h1><b>Sobre Nós</b></h1>
            <p><?= $model->descricao ?></p>
        </div>

        <!-- Add a section for the company features -->
        <div class="features">
            <h3>Contactos</h3>
            <p>Telefone : <?= $model->contactoTelefone ?></p>
            <p>Telemóvel : <?= $model->contactoTelemovel ?></p>
            <p>Email : <?= $model->email ?></p>
            <p>Localização : <?= $model->morada ?></p>
        </div>

        <div class="company-info">
                <h2>Ofertas desta empresa</h2>
                <div class="profile-content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade active show" id="profile-followers">
                                    <div class="list-group">
                                        <div class="list-group-item d-flex align-items-center">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="50px" class="rounded-sm ml-n2" />
                                            <div class="flex-fill pl-3 pr-3">
                                                <div><a href="#" class="text-dark font-weight-600">Ethel Wilkes</a></div>
                                                <div class="text-muted fs-13px">North Raundspic</div>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
