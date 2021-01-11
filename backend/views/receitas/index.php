<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReceitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Receita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idreceita',
            'nome',
            [
                'label' => 'Duração da Receita',
                'attribute' => 'duracaoreceitamin'
            ],
            [
                'label' => 'Duração da Preparação',
                'attribute' => 'duracaopreparacaomin'
            ],
            //'passos:ntext',
            [
                'label' => 'Utilizador',
                'attribute' => 'usernamereceita'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {ingredientes}',
                'buttons' => [
                    'ingredientes' => function($url, $model, $key) {
                        return Html::a('', \yii\helpers\Url::toRoute('ingredientes/index?receita='.$model->idreceita), ['class' => 'fas fa-carrot']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
