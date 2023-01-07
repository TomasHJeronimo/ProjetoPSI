<?php

namespace app\modules\api\controllers;

use common\models\Categoria;
use yii\rest\ActiveController;

class AnuncioController extends ActiveController
{
    public $modelClass = 'common\models\Anuncio';
    public $categorias = 'common\models\Categoria';


    /*
    Função para retribuir todos os anuncios de uma só empresa através do id da empresa
    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/anuncios/empresa/{id da empresa}

    Comando Curl:
    */
    public function actionEmpresa($id){
        $anuncios = new $this->modelClass;

        $anunciosEmpresa = $anuncios->find()->where(['id_Empresa' => $id])->all();

        return $anunciosEmpresa;
    }


    /*
    Função para retribuir todos os anuncios de uma categoria (Ex: Programação)
    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/anuncios/categoria/{id da categoria}

    Comando Curl:
    */
    public function actionCategoria($id){
        $anuncios = new $this->modelClass;

        $anunciosCategoria = $anuncios->find()->where(['categoria' => $id])->all();

        return $anunciosCategoria;
    }


    /*
    Função para retribuir todos os anuncios de uma categoria usando a designação da categoria
    Link para aceder ao resultado -> http://localhost/HuntingJobs/backend/web/api/anuncios/categoria/{nome da categoria}

    Comando Curl:
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
