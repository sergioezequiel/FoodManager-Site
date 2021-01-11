<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IngredienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingredientes da receita '.$receita;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Ingrediente', Url::toRoute('ingredientes/create?receita='.$receita), ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            [
                'label' => 'Quantidade Necessária',
                'attribute' => 'quantunidade'
            ],
            [
                'label' => 'Tipo de Preparação',
                'attribute' => 'tipotexto'
            ],
            [
                'label' => 'Produto',
                'attribute' => 'produtoname'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
