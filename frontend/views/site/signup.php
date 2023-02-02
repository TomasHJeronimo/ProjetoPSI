<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    .container {
        margin: 0 auto;
        text-align: center;
    }

    form {
        background-color: #f2f2f2;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px #ccc;
    }

    h1 {
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 30px;
    }

    label,
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>


<div class="container-fluid">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <h1>Sign Up</h1>
    <div class="form-group">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'email') ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'password')->passwordInput() ?>
    </div>
    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    <?php ActiveForm::end(); ?>
</div>
