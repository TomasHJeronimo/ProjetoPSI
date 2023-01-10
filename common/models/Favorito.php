<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "favorito".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_anuncio
 */
class Favorito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_anuncio'], 'required'],
            [['id_user', 'id_anuncio'], 'integer'],
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
        ];
    }
}
