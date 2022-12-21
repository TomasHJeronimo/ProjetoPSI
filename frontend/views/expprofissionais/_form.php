<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ExpProfissionais $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="exp-profissionais-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'experiencias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
