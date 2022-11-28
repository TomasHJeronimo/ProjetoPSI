<?php

use common\models\Anuncio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Anuncios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncio-index">



    <div class="container-fluid">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Anuncio', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Minhas Empresas</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Empresa</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Título</th>
                                <th scope="col" class="border-0 text-uppercase font-medium" style="width: 30%">
                                    Descrição
                                </th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Perfil Procurado</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Gerir</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?= ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemView' => '_anuncio',

                            ]); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



