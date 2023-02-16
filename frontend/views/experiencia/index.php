<?php

use common\models\Experiencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ExperienciaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Minhas Experiencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<header>
    <h1>Professional Experiences</h1>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }

        main {
            margin: 20px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .experience {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 20px;
        }

        .experience-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .experience-title {
            margin: 0;
        }

        .edit-button, .delete-button {
            border: none;
            background: none;
            cursor: pointer;
        }

        .edit-button {
            color: blue;
        }

        .delete-button {
            color: red;
            margin-left: auto;
        }

        .experience-date {
            margin: 0;
            font-weight: bold;
        }

        .experience-company {
            margin: 0;
        }

        .experience-description {
            margin: 0;
        }
    </style>
</header>
<main>
    <ul>
        <?php foreach ($experiencias as $experiencia) : ?>
            <li class="experience">
                <div class="experience-header">
                    <h2 class="experience-title"><?= $experiencia->titulo ?></h2>
                    <div>
                    <?= Html::a('<i class="btn btn-outline-info btn-circle btn-circle">Editar</i>', ['experiencia/update', 'id' => $experiencia->id], ['class' => 'settings','title'=>'Editar utilizador', 'data-toggle'=>'tooltip']); ?>
                    <?= Html::a('<i class="btn btn-outline-danger btn-circle btn-circle">Eliminar</i>', ['experiencia/delete', 'id' => $experiencia->id], [
                        'class' => 'delete',
                        'title'=>'Apagar',
                        'data' => [
                            'confirm' => 'Tem a certeza que quer apagar esta candidatura?',
                            'method' => 'post',
                        ],
                        'data-toggle'=>'tooltip',
                    ]) ?>
                    </div>
                </div>
                <p class="experience-date">Data Inicio : <?= $experiencia->data_inicio ?></p>
                <p class="experience-date">Data Fim : <?= $experiencia->data_fim ?></p>
                <p class="experience-description"><?= $experiencia->descricao ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</main>
