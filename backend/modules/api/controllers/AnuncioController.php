<?php

namespace app\modules\api\controllers;

use common\models\Categoria;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class AnuncioController extends ActiveController
{
    public $modelClass = 'common\models\Anuncio';
    public $categorias = 'common\models\Categoria';



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


    /*
    Função para retribuir todos os anuncios de uma só empresa através do id da empresa
    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/anuncios/empresa/{id da empresa}

    Comando Curl: curl -X GET http://localhost/HuntingJobs/backend/web/api/anuncios/empresa/1
    */
    public function actionEmpresa($id){
        $anuncios = new $this->modelClass;

        $anunciosEmpresa = $anuncios->find()->where(['id_Empresa' => $id])->all();

        return $anunciosEmpresa;
    }


    /*
    Função para retribuir todos os anuncios de uma categoria (Ex: Programação)
    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/anuncios/categoria/{id da categoria}

    Comando Curl: curl -X GET http://localhost/HuntingJobs/backend/web/api/anuncios/categoria/2
    */
    public function actionCategoria($id){
        $anuncios = new $this->modelClass;

        $anunciosCategoria = $anuncios->find()->where(['categoria' => $id])->all();

        return $anunciosCategoria;
    }


    /*
    Função para retribuir todos os anuncios de uma categoria usando a designação da categoria
    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/anuncios/categoria/{nome da categoria}

    Comando Curl: curl -X GET http://localhost/HuntingJobs/backend/web/api/anuncios/categoria/Marketing
    */
    public function actionCategorianome($nomecategoria){

        $anuncios = new $this->modelClass;

        $categorias = new $this->categorias;

        $categoriaNome = $categorias->find()->where(['Nome' => $nomecategoria])->one();

        $anunciosCategoria = $anuncios->find()->where(['categoria' => $categoriaNome->id])->all();

        return $anunciosCategoria;
    }

}


?>
