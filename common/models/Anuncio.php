<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anuncio".
 *
 * @property int $id
 * @property int $id_Empresa
 * @property string $titulo
 * @property string $descricao
 * @property string $perfil_procurado
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
            [['id_Empresa', 'titulo', 'descricao', 'perfil_procurado'], 'required'],
            [['id_Empresa'], 'integer'],
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
        ];
    }
}
