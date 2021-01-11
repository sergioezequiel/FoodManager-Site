<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->assetManager->forceCopy = true;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status' => 'Status',
            'created_at:date',
            //'updated_at',
            //'verification_token',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {permissions}',
                'buttons' => [
                    'permissions' => function($url, $model, $key) {
                        return Html::a('', '#', ['class' => 'fas fa-user-check', 'onclick' => 'alertPermissions("'.Url::toRoute('user/permissions').'", '.$model->getId().')']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
