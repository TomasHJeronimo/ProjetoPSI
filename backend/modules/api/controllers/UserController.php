<?php

namespace app\modules\api\controllers;

use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

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
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)){
            return $user;
        }
        throw new ForbiddenHttpException('No Authentication');
    }

    /* Método para devolver número de Utilizadores registados */
    public function actionCount()
    {
        $pratosmodel = new $this->modelClass;
        $recs = User::find()->all();
        return ['count' => count($recs)];
    }

}
