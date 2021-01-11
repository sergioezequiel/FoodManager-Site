<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = $model->idfeedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedback', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->idfeedback], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idfeedback], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'ID Feedback',
                'attribute' => 'idfeedback'
            ],
            'nome',
            [
                'label' => 'Assunto',
                'attribute' => 'subjet'
            ],
            'email:email',
            'texto:ntext',
            [
                'label' => 'Tipo (num)',
                'attribute' => 'tipo'
            ],
            [
                'label' => 'Tipo',
                'attribute' => 'nometipo'
            ],
            [
                'label' => 'ID Utilizador',
                'attribute' => 'idutilizador'
            ],
            [
                'label' => 'Utilizador',
                'attribute' => 'usernamefeedback'
            ],
        ],
    ]) ?>

</div>
