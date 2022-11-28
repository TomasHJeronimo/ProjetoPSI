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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
            if ($this->context->isUserAuthor()){


        ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_Empresa',
            'titulo',
            'descricao:ntext',
            'perfil_procurado:ntext',
        ],
    ]) ?>

</div>
