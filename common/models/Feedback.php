<?php

namespace common\models;

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
 * @property int $created_at
 * @property int $idutilizador
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
            [['nome', 'subjet', 'email', 'texto', 'tipo', 'created_at', 'idutilizador'], 'required'],
            [['texto'], 'string'],
            [['tipo', 'created_at', 'idutilizador'], 'integer'],
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
}
