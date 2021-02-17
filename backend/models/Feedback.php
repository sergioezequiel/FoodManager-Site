<?php

namespace app\models;

use common\models\User;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "feedback".
 *
 * @property int $idfeedback
 * @property string $nome
 * @property string $subjet
 * @property string $email
 * @property string $texto
 * @property int $tipo
 * @property int|null $respond
 * @property int $created_at
 * @property int $idutilizador
 *
 * @property User $idutilizador0
 */
class Feedback extends ActiveRecord
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
            [['nome', 'subjet', 'email', 'texto', 'tipo', 'created_at', 'idutilizador'], 'required'],
            [['texto'], 'string'],
            [['respond'], 'integer' , 'max' => 1, 'min' =>0],
            [['tipo', 'respond', 'created_at', 'idutilizador'], 'integer'],
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
            'respond' => 'Respond',
            'created_at' => 'Created At',
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

    public function getUsernameFeedback()
    {
        return $this->idutilizador0->username;
    }

    public function getNomeTipo()
    {
        return FeedbackCategoria::findOne($this->tipo)->categoria;
    }

    public function getRespostaFeed()
    {
        $resposta = "";

        if ($this->respond == 0){
            $resposta =  "<i style='color: red; font-size: 25px' class='fas fa-times-circle'></i> ";
        }else if ($this->respond == 1){
            $resposta =  "<i style='color: green; font-size: 25px' class='fas fa-check-circle'></i> ";
        }
        return $resposta;
    }

    public function getTimeForm()
    {
        return date('Y-d-m H:i:s', $this->created_at);
    }

}
