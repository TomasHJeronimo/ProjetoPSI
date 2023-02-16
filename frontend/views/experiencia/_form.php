<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/** @var yii\web\View $this */
/** @var common\models\Experiencia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="experiencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'categoria')->widget(Select2::classname(), [
        'data' => $itemsCategoria,
        'language' => 'pt',
        'options' => ['placeholder' => 'Todas'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
        $form->field($model,'data_inicio')->widget(\kartik\date\DatePicker::className(),[
                'name' => 'dp_1',
            'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
            'options' => ['placeholder' => 'Selecionar data de Inicio.'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d',
            ]
        ])
    ?>

    <?=
    $form->field($model,'data_fim')->widget(\kartik\date\DatePicker::className(),[
        'name' => 'dp_1',
        'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
        'options' => ['placeholder' => 'Data final.'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d',
        ]
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'btnEnviarExperiencia']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .experiencia-form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #btnEnviarExperiencia {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .experiencia-form h1 {
            display: none;
        }

        #btnEnviarExperiencia:hover {
            background-color: #3e8e41;
        }
    </style>
</head>



