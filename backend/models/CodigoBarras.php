<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CodigosBarras".
 *
 * @property int $codigobarras
 * @property string $nome
 * @property string $marca
 * @property int $idproduto
 */
class CodigoBarras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'CodigosBarras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigobarras', 'nome', 'marca', 'idproduto'], 'required'],
            [['codigobarras', 'idproduto'], 'integer'],
            [['nome', 'marca'], 'string', 'max' => 45],
            [['codigobarras'], 'unique'],
            [['idproduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['idproduto' => 'idproduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigobarras' => 'Codigobarras',
            'nome' => 'Nome',
            'marca' => 'Marca',
            'idproduto' => 'Idproduto',
        ];
    }
}
