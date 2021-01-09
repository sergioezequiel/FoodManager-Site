<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Codigo Barras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigo-barras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Codigo Barras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigobarras',
            'nome',
            'marca',
            'quantidade',
            'idproduto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
