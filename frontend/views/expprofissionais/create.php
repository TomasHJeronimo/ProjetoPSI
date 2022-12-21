<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ExpProfissionais $model */

$this->title = 'Create Exp Profissionais';
$this->params['breadcrumbs'][] = ['label' => 'Exp Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exp-profissionais-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
