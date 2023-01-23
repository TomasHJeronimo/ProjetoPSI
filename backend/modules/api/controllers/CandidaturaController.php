<?php

namespace app\modules\api\controllers;

use Cassandra\Date;
use common\models\Candidatura;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Response;


class CandidaturaController extends ActiveController
{

    /*
    *
       Comando Curl para receber os dados de todas as candidaturas:

             -> curl -u monteiroteste:testeapi -X GET http://localhost/HuntingJobs/backend/web/api/candidaturas

       Comando Curl para alterar um campo de uma candidatura:
             -> curl -u monteiroteste:testeapi -X PUT -d "mensagem=Nova Mensagem" localhost/HuntingJobs/backend/web/api/candidaturas/1

       Comando Curl para apagar uma candidatura:
             -> curl -u monteiroteste:testeapi -X DELETE localhost/HuntingJobs/backend/web/api/candidaturas/1

       Comando Curl para criar uma nova candidatura:
             -> curl -u monteiroteste:testeapi -X POST -d "id=1&id_user=1&id_anuncio=4&mensagem=Something&data_candidatura=2023-01-10 00:00:00" http://localhost/HuntingJobs/backend/web/api/candidaturas
    *
   */



    public $modelClass = 'common\models\Candidatura';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];

        return $behaviors;
    }




    public function auth($username, $password){
        $this->user = \common\models\User::findByUsername($username);

        if ($this->user && $this->user->validatePassword($password)) {
            return $this->user;
        }

        return null;
    }


    public function actionUser($id){
        $candidaturas = new $this->modelClass;
        $candidaturasUser = Candidatura::find()->where(['id_user' => $id])->all();

        return $candidaturasUser;
    }

    public function actionNova(){

        $request = Yii::$app->request;

        $params = $request->getBodyParams();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        $candidatura = new Candidatura();
        $candidatura->id_anuncio = $params['id_anuncio'];
        $candidatura->id_user = $params['id_user'];
        $candidatura->mensagem = $params['mensagem'];

        if ($candidatura->save()) {
            return $candidatura;
        } else {
            return null;
        }
    }

}


?>
