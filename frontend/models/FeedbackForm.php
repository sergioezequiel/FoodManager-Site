<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\Feedback;

class FeedbackForm extends ActiveRecord
{
    public $nome;
    public $tipo;
    public $subjet;
    public $assunto;
    public $email;
    public $texto;

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
        ];
    }

    public function submit()
    {
        if (!$this->validate()) {
            return null;
        }

        $feedback = new Feedback();
        $feedback->nome = '$this->nome';
        $feedback->tipo = 2;
        $feedback->subjet = '$this->assunto';
        $feedback->email = '$this->email';
        $feedback->texto = '$this->texto';
        $feedback->idutilizador = 1;

        if ($feedback->save()) {
            $auth = Yii::$app->authManager;
            $userRole = $auth->getRole('user');
            $auth->assign($userRole, $this->getIdutilizador0());

            return true;
        }

        return false;
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
