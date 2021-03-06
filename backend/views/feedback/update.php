<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'Editar Feedback: ' . $model->idfeedback;
$this->params['breadcrumbs'][] = ['label' => 'Feedback', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfeedback, 'url' => ['view', 'id' => $model->idfeedback]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
