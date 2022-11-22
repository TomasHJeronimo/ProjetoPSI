<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;


/** @var yii\web\View $this */
/** @var common\models\Empresa $model */
/** @var yii\widgets\ActiveForm $form */
?>




    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Nova Empresa</h3>
                        <form>

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <?= $form->field($model, 'Nome')->textInput(['maxlength' => true])->label('Nome da Empresa:') ?>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email:') ?>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <?= $form->field($model, 'contactoTelefone')->textInput()->label('Numero de Telefone:') ?>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <?= $form->field($model, 'contactoTelemovel')->textInput()->label('Numero de Telemóvel:') ?>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">

                                    <div class="form-outline">
                                        <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <?= $form->field($model, 'descricao')->widget(CKEditor::class, [
                                        'options' => ['rows' => 6],
                                    ])->label('Descrição da Empresa') ?>

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

