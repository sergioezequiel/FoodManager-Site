<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $idfeedback
 * @property string $nome
 * @property string $subjet
 * @property string $email
 * @property string $texto
 * @property int $tipo
 * @property int $idutilizador
 * @property int $estado
 * @property string $datacriacao
 *
 * @property User $idutilizador0
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'subjet', 'email', 'texto', 'tipo', 'idutilizador', 'estado'], 'required'],
            [['texto'], 'string'],
            [['tipo', 'idutilizador', 'estado'], 'integer'],
            [['datacriacao'], 'safe'],
            [['nome', 'subjet', 'email'], 'string', 'max' => 255],
            [['idutilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idutilizador' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idfeedback' => 'Idfeedback',
            'nome' => 'Nome',
            'subjet' => 'Subjet',
            'email' => 'Email',
            'texto' => 'Texto',
            'tipo' => 'Tipo',
            'idutilizador' => 'Idutilizador',
            'estado' => 'Estado',
            'datacriacao' => 'Datacriacao',
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
    public function getUsernameFeedback() {
        return $this->idutilizador0->username;
    }

    public function getNomeTipo(){
        $texto = '';

        switch ($this->tipo) {
            case 0:
                $texto = 'Sugestão de receita';
                break;
            case 1:
                $texto = 'Melhoria na app';
                break;
            case 2:
                $texto = 'Sugestões';
                break;
            case 3:
                $texto = 'Produto em falta (código de barras)';
                break;
            case 4:
                $texto = 'Feedback Geral';
                break;
            case 5:
                $texto = 'Outro';
                break;
            default:
                $texto = 'Desconhecido ('.$this->tipo.')';
                break;
        }

        return $texto;
    }
}
