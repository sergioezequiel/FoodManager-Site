<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "codigosbarras".
 *
 * @property int $codigobarras
 * @property string $nome
 * @property string $marca
 * @property float $quantidade
 * @property int $idproduto
 *
 * @property Produtos $idproduto0
 */
class CodigoBarras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codigosbarras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigobarras', 'nome', 'marca', 'quantidade', 'idproduto'], 'required'],
            [['codigobarras', 'idproduto'], 'integer'],
            [['quantidade'], 'number'],
            [['nome', 'marca'], 'string', 'max' => 45],
            [['codigobarras'], 'unique'],
            [['idproduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['idproduto' => 'idproduto']],
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
            'quantidade' => 'Quantidade',
            'idproduto' => 'Idproduto',
        ];
    }

    /**
     * Gets query for [[Idproduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduto0()
    {
        return $this->hasOne(Produtos::className(), ['idproduto' => 'idproduto']);
    }
}
