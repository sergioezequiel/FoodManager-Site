<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Códigos Barras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigo-barras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Código Barras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Código Barras',
                'attribute' => 'codigobarras'
            ],
            'nome',
            'marca',
            [
                'label' => 'Quantidade',
                'attribute' => 'quantidadecomunidade'
            ],
            [
                'label' => 'Produto',
                'attribute' => 'produtoname'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
