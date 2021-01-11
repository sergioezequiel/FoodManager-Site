<?php

/* @var $this yii\web\View */
/* @var $model \app\models\Feedback */

use app\models\Feedback;
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
                <?= $form->field($model, 'nome')->textInput(['autofocus' => true, 'errorOptions' => ['tag' => false]]) ?>
                <p class="invalid-feedback">Username cannot be blank.</p>
            </div>

            <div class="form-group">
                <label for="tipo">Choose a car:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="0">Sugestão de Receita</option>
                    <option value="1">Melhoria na App</option>
                    <option value="2">Sugestões</option>
                    <option value="3">Produto em falta (código de barras)</option>
                    <option value="4">Feedback Geral</option>
                    <option value="5">Outro</option>
                </select>
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
