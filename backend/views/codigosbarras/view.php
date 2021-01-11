<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CodigoBarras */

$this->title = $model->codigobarras;
$this->params['breadcrumbs'][] = ['label' => 'Codigo Barras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="codigo-barras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->codigobarras], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->codigobarras], [
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
                'label' => 'Códigos Barras',
                'attribute' => 'codigobarras'
            ],
            'nome',
            'marca',
            'quantidade',
            [
                'label' => 'ID Produto',
                'attribute' => 'idproduto'
            ],
            [
                'label' => 'Produto',
                'attribute' => 'produtoname'
            ],
        ],
    ]) ?>

</div>
