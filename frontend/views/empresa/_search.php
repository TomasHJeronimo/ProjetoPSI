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


    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'id') ?></div>

        <div class="col-md-2"><?= $form->field($model, 'idAdmin') ?></div>

        <div class="col-md-2"><?= $form->field($model, 'Nome') ?></div>

        <div class="col-md-2"><?= $form->field($model, 'descricao') ?></div>

        <div class="col-md-2"><?= $form->field($model, 'contactoTelefone') ?></div>

        <div class="col-md-2"> <?php // echo $form->field($model, 'contactoTelemovel') ?></div>
    </div>
    <?php // echo $form->field($model, 'morada') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
