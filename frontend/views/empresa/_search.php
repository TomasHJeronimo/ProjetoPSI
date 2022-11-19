<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\EmpresaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idAdmin') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'contactoTelefone') ?>

    <?php // echo $form->field($model, 'contactoTelemovel') ?>

    <?php // echo $form->field($model, 'morada') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
