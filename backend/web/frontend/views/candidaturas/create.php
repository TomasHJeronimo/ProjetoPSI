<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Candidatura $model */

$this->title = 'Create Candidatura';
$this->params['breadcrumbs'][] = ['label' => 'Candidaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
