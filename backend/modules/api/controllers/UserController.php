<?php

namespace app\modules\api\controllers;

use common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use const Couchbase\ENCODER_FORMAT_JSON;

/**
 * Default controller for the `api` module
 */
class UserController extends ActiveController
{
    /*
            curl -u "login:password" -X GET http://localhost/HuntingJobs/backend/web/api/users
    */

    public $modelClass = 'common\models\User';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];

        return $behaviors;
    }


    /*
        Função basic Auth
   */
    
    public function auth($username, $password){
        $this->user = \common\models\User::findByUsername($username);

        if ($this->user && $this->user->validatePassword($password)) {
            return $this->user;
        }

        return null;
    }


    /*
        Função para devolver o numero de utilizadores registados no website

        Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/users/count

        Dados necessários para obter resposta:
            -> Basic Auth com username, e password
                -> Caso tenha permissões , pode obter a resposta da API

        Comando Curl: curl -u "login:password" -X GET http://localhost/HuntingJobs/backend/web/api/users/count
   */
    public function actionCount()
    {
        $recs = User::find()->all();
        return ['count' => count($recs)];
    }

    /*
        Função para devolver o numero de utilizadores registados no website na ultima semana

        Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/users/semana

        Comando Curl: curl -u "login:password" -X GET http://localhost/HuntingJobs/backend/web/api/users/semana
   */
    public function actionSemana(){
        $FirstDay = date("Y-m-d", strtotime('sunday last week'));
        $LastDay = date("Y-m-d", strtotime('sunday this week'));


        $users = new $this->modelClass;
        $semana = $users::find()->where(['between', 'created_at', $FirstDay, $LastDay])->all();

        return ['count' => count($semana)];
    }




}
