<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\Feedback;

class FeedbackForm extends Model
{
    public $nome;
    public $tipo;
    public $subjet;
    public $assunto;
    public $email;
    public $texto;
    public $idutilizador = 1;

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
            [['nome', 'subjet', 'email', 'texto', 'tipo', 'idutilizador'], 'required'],
            [['texto'], 'string'],
            [['tipo', 'idutilizador'], 'integer'],
            [['nome', 'subjet', 'email'], 'string', 'max' => 255],
            [['idutilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idutilizador' => 'id']],
        ];
    }

    public function submit()
    {
        if (!$this->validate()) {
            return null;
        }

        $feedback = new Feedback();
        $feedback->nome = $this->nome;
        $feedback->tipo = $this->tipo;
        $feedback->subjet =  $this->subjet;
        $feedback->email = $this->email;
        $feedback->texto = $this->texto;
        $feedback->idutilizador = $this->idutilizador;

        return $feedback->save();
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
}
