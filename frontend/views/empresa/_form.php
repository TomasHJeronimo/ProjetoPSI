<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Empresa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true])->label('Nome da Empresa') ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 12,'maxlength' => true])->label('Descrição da empresa') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactoTelefone')->textInput()->label('Numero de Telefone') ?>

    <?= $form->field($model, 'contactoTelemovel')->textInput()->label('Numero de Telemóvel') ?>

    <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
