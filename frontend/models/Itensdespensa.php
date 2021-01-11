<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "itensdespensa".
 *
 * @property int $iditemdespensa
 * @property string $nome
 * @property float $quantidade
 * @property string $validade
 * @property int $idproduto
 * @property int $idutilizador
 *
 * @property Produto $idproduto0
 * @property User $idutilizador0
 */
class Itensdespensa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itensdespensa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'quantidade', 'validade', 'idproduto', 'idutilizador'], 'required'],
            [['quantidade'], 'number'],
            [['validade'], 'safe'],
            [['idproduto', 'idutilizador'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['idproduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['idproduto' => 'idproduto']],
            [['idutilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idutilizador' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iditemdespensa' => 'Iditemdespensa',
            'nome' => 'Nome',
            'quantidade' => 'Quantidade',
            'validade' => 'Validade',
            'idproduto' => 'Idproduto',
            'idutilizador' => 'Idutilizador',
        ];
    }

    /**
     * Gets query for [[Idproduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduto0()
    {
        return $this->hasOne(Produto::className(), ['idproduto' => 'idproduto']);
    }

    /**
     * Gets query for [[Idutilizador0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdutilizador0()
    {
        return $this->hasOne(User::className(), ['id' => 'idutilizador']);
    }

    public function getQuantidadeUnidade() {
        return $this->quantidade.' '.$this->idproduto0->unidade;
    }
}
