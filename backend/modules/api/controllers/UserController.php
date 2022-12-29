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

    public function auth($username, $password){
        $this->user = \common\models\User::findByUsername($username);

        if ($this->user && $this->user->validatePassword($password)) {
            return $this->user;
        }

        return null;
    }

    /* Método para devolver número de Utilizadores registados */
    public function actionCount()
    {
        $recs = User::find()->all();
        return ['count' => count($recs)];
    }




}
