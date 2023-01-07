<?php

namespace app\modules\api\controllers;

use common\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class AuthController extends ActiveController
{
    public $modelClass = 'common\models\User';


    /*
        Função para registar um novo utilizador
        Maioritariamente desenvolvido para o registo na APlicação android

        Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/users/novo

        Dados necessários no body para registar o utilizador : username, email, password

        Comando Curl:
   */
    public function actionNovo()
    {
        $request = Yii::$app->request;

        $params = $request->getBodyParams();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $user = new User();
        $user->username = $params['username'];
        $user->email = $params['email'];
        $user->setPassword($params['password']);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->created_at = date('yyyy-mm-dd', date(time()));
        $user->status = 10;

        //adicionar common_user ao registar no website
        $auth = Yii::$app->authManager;
        $utilizadorComumRole = $auth->getRole('common_user');

        if ($user->save() && $auth->assign($utilizadorComumRole, $user->id)) {
            return $user;
        } else {
            return null;
        }
    }



    /*
    Função para verificar se o utilizador existe , e caso os dados estejam corretos, devolve os dados do utilizador
    Maioritariamente desenvolvido para Login na APlicação android

    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/users/auth/login

    Comando Curl:
    */
    public function actionLogin()
    {
        $request = Yii::$app->request;

        $params = $request->getBodyParams();


        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $user = User::findByUsername($params['username']);

        if ($user && $user->validatePassword($params['password'])) {
            return $user;
        }
    }


}


?>
