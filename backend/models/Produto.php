<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $idproduto
 * @property string $nome
 * @property string $unidade
 * @property string $imagem
 * @property int $idcategoria
 *
 * @property Codigosbarra[] $codigosbarras
 * @property Ingrediente[] $ingredientes
 * @property Itensdespensa[] $itensdespensas
 * @property Categoria $idcategoria0
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'unidade', 'imagem', 'idcategoria'], 'required'],
            [['imagem'], 'string'],
            [['idcategoria'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['unidade'], 'string', 'max' => 10],
            [['idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['idcategoria' => 'idcategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproduto' => 'Idproduto',
            'nome' => 'Nome',
            'unidade' => 'Unidade',
            'imagem' => 'Imagem',
            'idcategoria' => 'Idcategoria',
        ];
    }

    /**
     * Gets query for [[Codigosbarras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigosbarras()
    {
        return $this->hasMany(Codigosbarra::className(), ['idproduto' => 'idproduto']);
    }

    /**
     * Gets query for [[Ingredientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientes()
    {
        return $this->hasMany(Ingrediente::className(), ['idproduto' => 'idproduto']);
    }

    /**
     * Gets query for [[Itensdespensas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItensdespensas()
    {
        return $this->hasMany(Itemdespensa::className(), ['idproduto' => 'idproduto']);
    }

    /**
     * Gets query for [[Idcategoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategoria0()
    {
        return $this->hasOne(Categoria::className(), ['idcategoria' => 'idcategoria']);
    }

    public function getCategoriaName() {
        return $this->idcategoria0->nome;
    }
}
