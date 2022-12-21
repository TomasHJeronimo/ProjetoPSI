<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expprofissionais".
 *
 * @property string $experiencias
 * @property string $referencias
 * @property int $id
 * @property int $user_id
 * @property int $categoria_id
 * @property string $titulo
 */
class ExpProfissionais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expprofissionais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['experiencias', 'referencias', 'user_id', 'categoria_id', 'titulo'], 'required'],
            [['user_id', 'categoria_id'], 'integer'],
            [['experiencias'], 'string', 'max' => 700],
            [['referencias'], 'string', 'max' => 100],
            [['titulo'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'experiencias' => 'Experiencias',
            'referencias' => 'Referencias',
            'id' => 'ID',
            'user_id' => 'User ID',
            'categoria_id' => 'Categoria ID',
            'titulo' => 'Titulo',
        ];
    }
}
