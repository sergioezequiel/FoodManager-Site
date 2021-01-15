<?php

/* @var $this yii\web\View */

/* @var $model \app\models\Feedback */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Contacte-nos</h2>
                <p>Tem uma ideia? Tem sugestão?<br>Nós queremos saber!</p>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'send']); ?>

            <div class="form-group">
                <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'tipo')->dropDownList(['Sugestão de Receita', 'Melhoria na App', 'Sugestões', 'Produto em falta (código de barras)', 'Feedback Geral', 'Outro'], ['className' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'subjet')->textInput(['id' => 'subjet', 'className' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'email')->input('email', ['id' => 'email', 'className' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'texto')->textarea(['id' => 'message', 'className' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-block', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </section>
</main>
