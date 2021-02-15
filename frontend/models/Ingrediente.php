<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredientes".
 *
 * @property int $idingrediente
 * @property string $nome
 * @property int $quantnecessaria
 * @property int $tipopreparacao
 * @property int $idproduto
 * @property int $idreceita
 *
 * @property Receita $idreceita0
 * @property Produto $idproduto0
 */
class Ingrediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'quantnecessaria', 'tipopreparacao', 'idproduto', 'idreceita'], 'required'],
            [['quantnecessaria', 'tipopreparacao', 'idproduto', 'idreceita'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['idreceita'], 'exist', 'skipOnError' => true, 'targetClass' => Receita::className(), 'targetAttribute' => ['idreceita' => 'idreceita']],
            [['idproduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['idproduto' => 'idproduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idingrediente' => 'Idingrediente',
            'nome' => 'Nome',
            'quantnecessaria' => 'Quantnecessaria',
            'tipopreparacao' => 'Tipopreparacao',
            'idproduto' => 'Idproduto',
            'idreceita' => 'Idreceita',
        ];
    }

    /**
     * Gets query for [[Idreceita0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdreceita0()
    {
        return $this->hasOne(Receita::className(), ['idreceita' => 'idreceita']);
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

    public function getQuantUnidade() {
        return $this->quantnecessaria.' '.$this->idproduto0->unidade;
    }

    public function getTipoTexto() {
        $texto = '';

        switch ($this->tipopreparacao) {
            case 0:
                $texto = 'Sem Preparação';
                break;
            case 1:
                $texto = 'Às rodelas';
                break;
            case 2:
                $texto = 'Aos cubos';
                break;
            case 3:
                $texto = 'Outro';
                break;
            default:
                $texto = 'Tipo Desconhecido';
                break;
        }

        return $texto;
    }

    public static function getTipoTextoId($tipoPreparacao) {
        $texto = '';

        switch ($tipoPreparacao) {
            case 0:
                $texto = 'Sem Preparação';
                break;
            case 1:
                $texto = 'Às rodelas';
                break;
            case 2:
                $texto = 'Aos cubos';
                break;
            case 3:
                $texto = 'Outro';
                break;
            default:
                $texto = 'Tipo Desconhecido';
                break;
        }

        return $texto;
    }

    public function getProdutoName() {
        return $this->idproduto0->nome;
    }

    public function getReceitaName() {
        return $this->idreceita0->nome;
    }
}
