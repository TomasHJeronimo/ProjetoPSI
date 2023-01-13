<?php

namespace app\modules\api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class ExperienciaController extends ActiveController
{
    /*

    http://localhost/HuntingJobs/backend/web/api/empresas
    Usado para obter os dados de todas as empresas

    Comando Curl: curl -X GET http://localhost/HuntingJobs/backend/web/api/experiencias

    */

    public $modelClass = 'common\models\Experiencia';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];

        return $behaviors;
    }


    //  --  Função basic Auth  --

    public function auth($username, $password){
        $this->user = \common\models\User::findByUsername($username);

        if ($this->user && $this->user->validatePassword($password)) {
            return $this->user;
        }

        return null;
    }





}


?>
