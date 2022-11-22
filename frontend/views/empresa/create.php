<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Empresa $model */


$this->title = 'Create Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">

    <?php

    if (Yii::$app->user->isGuest){
        throw new \yii\web\ForbiddenHttpException('Acesso Negado');
    }
    else{
        $model->idAdmin = Yii::$app->getUser()->id;
        ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php
    }
    ?>



</div>
