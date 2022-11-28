<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2"> <?= $form->field($model, 'id') ?></div>
        <div class="col-md-2"> <?= $form->field($model, 'titulo') ?></div>
        <div class="col-md-2"> <?=
            $form->field($model, 'categoria')
                ->dropDownList(
                    $items,           // Flat array ('id'=>'label')
                    ['prompt' => 'Select...']    // options
                );
            ?> </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
