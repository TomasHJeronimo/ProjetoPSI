<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Error';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">

    <h1>Erro, acção nao autorizada</h1>


    <?php echo "O utilizador com id ". Yii::$app->getUser()->id . " não está autorizado a consultar esta página" ?>

    <br>

    <p>Por favor, voltar atrás</p>
    <br>

    <?= Html::a('Voltar', ['view', 'id'=>Yii::$app->getUser()->id], ['class' => 'btn btn-primary']); ?>



</div>

