<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property int $idAdmin
 * @property string $Nome
 * @property string $descricao
 * @property int|null $contactoTelefone
 * @property int|null $contactoTelemovel
 * @property string $morada
 * @property string $email
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)){
            if ($this->isNewRecord){
                $this->idAdmin = Yii::$app->getUser()->id;
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'Nome', 'descricao', 'morada', 'email'], 'required'],
            [['idAdmin', 'contactoTelefone', 'contactoTelemovel'], 'integer'],
            [['Nome'], 'string', 'max' => 50],
            [['descricao', 'email'], 'string', 'max' => 255],
            [['morada'], 'string', 'max' => 75],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idAdmin' => 'Id Admin',
            'Nome' => 'Nome',
            'descricao' => 'Descricao',
            'contactoTelefone' => 'Contacto Telefone',
            'contactoTelemovel' => 'Contacto Telemovel',
            'morada' => 'Morada',
            'email' => 'Email',
        ];
    }
}
