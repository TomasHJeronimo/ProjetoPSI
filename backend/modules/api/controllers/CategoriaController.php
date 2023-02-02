<?php

namespace app\modules\api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class CategoriaController extends ActiveController
{
    /*

    Usado para obter os dados de todas as categorias

    Comando Curl: curl -u monteiroteste:testeapi -X GET http://localhost/HuntingJobs/backend/web/api/categorias

    */

    public $modelClass = 'common\models\Categoria';

/*
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];

        return $behaviors;
    }



     --   Função basic Auth --

    public function auth($username, $password){
        $this->user = \common\models\User::findByUsername($username);

        if ($this->user && $this->user->validatePassword($password)) {
            return $this->user;
        }

        return null;
    }

    */
}




