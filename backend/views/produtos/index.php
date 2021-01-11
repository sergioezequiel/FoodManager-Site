<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'ID Produto',
                'attribute' => 'idproduto',
                'contentOptions' => ['style' => 'width: auto;']
            ],
            'nome',
            'unidade',
            [
                'attribute' => 'imagem',
                'contentOptions' => ['style' => 'max-width: 200px !important;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;']
            ],
            [
                'label' => 'Categoria',
                'attribute' => 'categorianame'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
