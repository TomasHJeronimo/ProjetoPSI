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
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
