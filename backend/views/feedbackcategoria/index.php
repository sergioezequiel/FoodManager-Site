<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackCategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedback Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Feedback Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
