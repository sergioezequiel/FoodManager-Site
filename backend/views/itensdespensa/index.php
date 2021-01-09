<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Despensas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-despensa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Item Despensa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iditemdespensa',
            'nome',
            'quantidade',
            'validade',
            'idproduto',
            //'idutilizador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
