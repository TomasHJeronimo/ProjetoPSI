<?php

use common\models\Empresa;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Anuncio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?php
                            if ($model->titulo)
                            {?>
                                <?=$model->titulo; ?>
                            <?php
                            } else
                                {
                                    ?>
                                    Novo Anuncio
                                <?php
                                }
                            ?></h3>
                        <form>

                            <div class="row">
                                <div class="col-md-12 mb-4">

                                    <div class="form-outline">
                                        <?= $form->field($model, 'titulo')->textInput(['maxlength' => true])->label('Titulo:') ?>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <?=
                                        $form->field($model, 'id_Empresa')->widget(Select2::classname(), [
                                            'data' => $items,
                                            'language' => 'pt',
                                            'options' => ['placeholder' => 'Todas'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                        ?>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
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
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">

                                    <div class="form-outline">
                                        <?= $form->field($model, 'descricao')->widget(CKEditor::class, [
                                            'options' => ['rows' => 6],
                                        ])->label('Descriçaõ da Oferta') ?>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <?= $form->field($model, 'perfil_procurado')->widget(CKEditor::class, [
                                        'options' => ['rows' => 6],
                                    ])->label('Perfil Procurado') ?>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
