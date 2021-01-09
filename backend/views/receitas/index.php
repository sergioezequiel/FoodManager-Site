<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idreceita',
            'nome',
            'duracaoreceita',
            'duracaopreparacao',
            'passos:ntext',
            //'idutilizador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
