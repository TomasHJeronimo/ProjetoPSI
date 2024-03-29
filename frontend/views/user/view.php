<?php

use common\models\User;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model User */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="user-view">


    <?php

    if (Yii::$app->getUser()->id != $model->id){
        // throw new \yii\web\ForbiddenHttpException('Accesso Negado');
    }
    else
    {
    ?>

    <style>
        #vertudo {
            text-decoration: none;
        }

        .mt-5 {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        p {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical
        }

        #GFG {
            text-decoration: none;
        }

        .container {
            width: 1720px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>

    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                         width="150px"
                                                                                         src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold"><?= $model->username ?></span><span
                        class="text-black-50"> <?= $model->email ?> </span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" readonly="true"
                                                                                    class="form-control"
                                                                                    placeholder="<?= $model->username ?>"
                                                                                    value=""></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" readonly="true"
                                                                                        class="form-control"
                                                                                        placeholder=""
                                                                                        value="<?= $model->password_hash ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">País</label><input type="text" readonly="true"
                                                                                   class="form-control"
                                                                                   value="Em Desenvolvimento"></div>
                    <div class="col-md-6"><label class="labels">Região</label><input type="text" readonly="true"
                                                                                     class="form-control"
                                                                                     value="Em Desenvolvimento"></div>
                </div>


            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Experiências profissionais</span><?= Html::a('<span>Adicionar uma Experiência</span>', ['experiencia/create'], ['id' => 'GFG', 'class' => 'border px-3 p-1 add-experience']) ?></span>
                </div>
                <br>


                <?php
                foreach ($experiencias as $experiencia) {
                    ?>
                    <div class="card mt-5 border-5 pt-2 active pb-0 px-3">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title "><b><?= $experiencia->titulo ?></b></h4>

                                </div>
                                <div class="col-12">
                                    <p>
                                        <?= $experiencia->descricao ?>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer bg-white px-0">
                            <div class="row">
                                <div class="col-md-auto">
                                    <img src="https://img.icons8.com/search" width="19" height="19">
                                    <?= Html::a('<small>Ver Experiencia</small>', ['experiencia/view', 'id' => $experiencia->id], ['id' => 'GFG', 'class' => 'btn btn-outlined btn-black text-muted bg-transparent','data-wow-delay' => "0.7s"]) ?>
                                </div>
                                <div class=" col-md-auto ">
                                    <img src="https://img.icons8.com/ios/50/000000/settings.png" width="19" height="19">
                                    <?= Html::a('<small>Alterar Experiencia</small>', ['experiencia/update', 'id' => $experiencia->id], ['id' => 'GFG', 'class' => 'btn btn-outlined btn-black text-muted bg-transparent','data-wow-delay' => "0.7s"]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                }
                ?>


            </div>
            <span style="display: table;margin: 0 auto"><?= Html::a('Ver todas as experiencias...', ['experiencia/index'], ['class' => 'btn btn-primary']); ?></span>
        </div>
    </div>
</div>
    </div>

    </div>

<?php

}

?>
