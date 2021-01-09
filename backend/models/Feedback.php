<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $idfeedback
 * @property string $texto
 * @property int $tipo
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
            [['texto', 'tipo', 'idutilizador'], 'required'],
            [['texto'], 'string'],
            [['tipo', 'idutilizador'], 'integer'],
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
            'texto' => 'Texto',
            'tipo' => 'Tipo',
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
