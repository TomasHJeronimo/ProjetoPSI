<?php

use common\models\Empresa;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Anuncio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
     $form->field($model, 'id_Empresa')
        ->dropDownList(
            $items,           // Flat array ('id'=>'label')
            ['prompt'=>'Select...']    // options
        );
    ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perfil_procurado')->textarea(['rows' => 6]) ?>

    <?=
    $form->field($model, 'categoria')
        ->dropDownList(
            $itemsCategoria,           // Flat array ('id'=>'label')
            ['prompt'=>'Select...']    // options
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
