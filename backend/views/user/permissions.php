<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Mudar permissões do utilizador: '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$roles = Yii::$app->authManager->getRoles();
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>



</div>
