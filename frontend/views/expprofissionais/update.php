<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ExpProfissionais $model */

$this->title = 'Update Exp Profissionais: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Exp Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exp-profissionais-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
