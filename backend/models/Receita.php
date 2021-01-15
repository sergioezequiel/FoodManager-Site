<?php

namespace app\models;

use Bluerhinos\phpMQTT;
use common\models\User;
use Yii;

/**
 * This is the model class for table "receitas".
 *
 * @property int $idreceita
 * @property string $imagem
 * @property string $nome
 * @property int $duracaoreceita
 * @property int $duracaopreparacao
 * @property string $passos
 * @property int $idutilizador
 *
 * @property User $idutilizador0
 * @property Ingrediente[] $ingredientes
 */
class Receita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imagem', 'nome', 'duracaoreceita', 'duracaopreparacao', 'passos', 'idutilizador'], 'required'],
            [['imagem', 'passos'], 'string'],
            [['duracaoreceita', 'duracaopreparacao', 'idutilizador'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['idutilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idutilizador' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreceita' => 'Idreceita',
            'imagem' => 'Imagem',
            'nome' => 'Nome',
            'duracaoreceita' => 'Duracaoreceita',
            'duracaopreparacao' => 'Duracaopreparacao',
            'passos' => 'Passos',
            'idutilizador' => 'Idutilizador',
        ];
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

    /**
     * Gets query for [[Ingredientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientes()
    {
        return $this->hasMany(Ingrediente::className(), ['idreceita' => 'idreceita']);
    }

    public function getUsernameReceita() {
        return $this->idutilizador0->username;
    }

    public function getDuracaoReceitaMin() {
        return $this->duracaoreceita.' min';
    }

    public function getDuracaoPreparacaoMin() {
        return $this->duracaopreparacao.' min';
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $nome = $this->nome;

        $this->publishMosquittto("geral", "Nova receita adicionada! ".$nome);
    }

    public function publishMosquittto($canal, $msg) {
        $server = "127.0.0.1";
        $port = 1883;
        $username = "";
        $password = "";
        $client_id = "akwduaiwidawhihawifiau";
        $mqtt = new phpMQTT($server, $port, $client_id);
        if($mqtt->connect(true, null, $username, $password)) {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
    }
}
