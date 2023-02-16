<?php

namespace common\models;

use frontend\mosquitto;
use frontend\mosquitto\phpMQTT;
use Yii;

/**
 * This is the model class for table "anuncio".
 *
 * @property int $id
 * @property int $id_Empresa
 * @property string $titulo
 * @property string $descricao
 * @property string $perfil_procurado
 * @property int $categoria
 */
class Anuncio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anuncio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_Empresa', 'titulo', 'descricao', 'perfil_procurado', 'categoria'], 'required'],
            [['id_Empresa', 'categoria'], 'integer'],
            [['descricao', 'perfil_procurado'], 'string'],
            [['titulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_Empresa' => 'Id Empresa',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'perfil_procurado' => 'Perfil Procurado',
            'categoria' => 'Categoria',
        ];
    }


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $id = $this->id;
        $id_empresa = $this->id_Empresa;
        $titulo = $this->titulo;
        $descricao = $this->descricao;
        $perfil = $this->perfil_procurado;
        $categoria = $this->categoria;

        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->idEmpresa=$id_empresa;
        $myObj->titulo=$titulo;
        $myObj->descricao=$descricao;
        $myObj->perfil=$perfil;
        $myObj->categoria=$categoria;

        $myJSON = json_encode($myObj);

        if ($insert){

            $this->mosquittoPublish($myObj->categoria, "O anuncio ".
                $myObj->titulo ." foi adicionado com a categoria ". $myObj->categoria );

            $this->mosquittoPublish("ANUNCIOS", "O anuncio ".
                $myObj->titulo ." foi adicionado á lista");
        }

    }

   public function afterDelete()
   {
       parent::afterDelete();
       $prod_id = $this->id;
       $prod_categoria = $this->categoria;
       $prod_titulo = $this->titulo;
       $myObj=new \stdClass();
       $myObj->id=$prod_id;
       $myObj->titulo=$prod_titulo;
       $myObj->categoria = $prod_categoria;
       $myJSON = json_encode($myObj);

       $this->mosquittoPublish($myObj->categoria, "O anuncio '".
           $myObj->titulo ."' foi eliminado.");

       $this->mosquittoPublish("ANUNCIOS", "O anuncio '".
           $myObj->titulo ."' foi eliminado.");
   }


    public function mosquittoPublish($canal, $msg)
    {
        $server = "localhost";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $mqtt->publish($canal, $msg, 1);
            $mqtt->close();
        } else {
            file_put_contents("debug.output", "Time out!");
        }
    }

}


