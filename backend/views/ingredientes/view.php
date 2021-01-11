<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */

$this->title = $model->idingrediente;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientes da receita '.$model->idreceita, 'url' => ['index?receita='.$model->idingrediente]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingrediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->idingrediente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idingrediente], [
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
                'label' => 'ID Ingrediente',
                'attribute' => 'idingrediente'
            ],
            'nome',
            [
                'label' => 'Quantidade Necessária',
                'attribute' => 'quantunidade'
            ],
            [
                'label' => 'Tipo de Preparação (num)',
                'attribute' => 'tipopreparacao'
            ],
            [
                'label' => 'Tipo de Preparação',
                'attribute' => 'tipotexto'
            ],
            [
                'label' => 'ID Produto',
                'attribute' => 'idproduto'
            ],
            [
                'label' => 'Produto',
                'attribute' => 'produtoname'
            ],
            [
                'label' => 'ID Receita',
                'attribute' => 'idreceita'
            ],
            [
                'label' => 'Receita',
                'attribute' => 'receitaname'
            ],
        ],
    ]) ?>

</div>
