<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experiencia".
 *
 * @property int $id
 * @property int $idUser
 * @property string $titulo
 * @property string $descricao
 * @property int $categoria
 * @property string $data_inicio
 * @property string $data_fim
 */
class Experiencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experiencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'titulo', 'descricao', 'categoria', 'data_inicio', 'data_fim'], 'required'],
            [['idUser', 'categoria'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUser' => 'Id User',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'categoria' => 'Categoria',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
        ];
    }
}
