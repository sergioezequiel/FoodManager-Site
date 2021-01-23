<?php

/* @var $this yii\web\View */

/* @var $model \app\models\Feedback */

use frontend\assets\FoodmanAsset;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


$assets = FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page contact-us-page">
    <section class="clean-block clean-hero clean-form dark"
             style="color: rgba(15,16,17,0.85); background: url(&quot;<?= $assets->baseUrl ?>/assets/img/main_page.jpg&quot;),center / cover no-repeat; border-color: rgba(18,21,23,0.85); padding-top: 50px; padding-bottom: 50px;">
            <div class="container" style="z-index: 5; margin-bottom: 15px; " align="left">
                <div class="block-heading">
                    <h2 class="text-info">Contacte-nos</h2>
                    <p style="color: white">Tem uma ideia? Tem sugestão?<br>Nós queremos saber!</p>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'send']); ?>

                <div class="form-group">
                    <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'tipo')->dropDownList(['Sugestão de Receita', 'Melhoria na App', 'Sugestões', 'Produto em falta (código de barras)', 'Feedback Geral', 'Outro'], ['className' => 'form-control','prompt' => ' -- Selecionar Tipo --']) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'subjet')->textInput(['id' => 'subjet', 'className' => 'form-control'])->label('Assunto') ?>
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
