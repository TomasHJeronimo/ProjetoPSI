<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "candidatura".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_anuncio
 * @property string $mensagem
 * @property string $data_candidatura
 */
class Candidatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_anuncio', 'mensagem'], 'required'],
            [['id_user', 'id_anuncio'], 'integer'],
            [['mensagem'], 'string'],
            [['data_candidatura'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_anuncio' => 'Id Anuncio',
            'mensagem' => 'Mensagem',
            'data_candidatura' => 'Data Candidatura',
        ];
    }
}
