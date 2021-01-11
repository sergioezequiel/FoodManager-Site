<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Receita */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="receita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->idreceita], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idreceita], [
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
                'label' => 'ID Receita',
                'attribute' => 'idreceita'
            ],
            'imagem:ntext',
            'nome',
            [
                'label' => 'Duração da Receita',
                'attribute' => 'duracaoreceitamin'
            ],
            [
                'label' => 'Duração da Preparação',
                'attribute' => 'duracaopreparacaomin'
            ],
            'passos:ntext',
            [
                'label' => 'ID Utilizador',
                'attribute' => 'idutilizador'
            ],
            [
                'label' => 'Utilizador',
                'attribute' => 'usernamereceita'
            ],
        ],
    ]) ?>

</div>
