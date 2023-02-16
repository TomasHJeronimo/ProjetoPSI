<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Candidatura $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="candidatura-form">

    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin: 0;
            padding: 20px;
            background-color: #333;
            color: #fff;
            font-size: 24px;
        }

        .candidatura-form {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
            background-color: #f2f2f2;
            color: #333;
            cursor: not-allowed;
        }

        #btnEnviar {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        #btnEnviar:hover {
            background-color: #4d4d4d;
        }
    </style>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mensagem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_candidatura')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'btnEnviar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
