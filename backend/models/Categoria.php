<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categorias".
 *
 * @property int $idcategoria
 * @property string $nome
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => 'Idcategoria',
            'nome' => 'Nome',
        ];
    }
}
