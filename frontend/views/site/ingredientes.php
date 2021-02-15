<?php

/* @var $this yii\web\View
 * @var $ingredientesdisp Ingrediente
 * @var $ingredientes Ingrediente
 * @var $ingredientesindisp Ingrediente
 * @var $receita Ingrediente
 */

use app\models\Ingrediente;
use yii\helpers\Html;

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page faq-page">
    <section class="clean-block clean-faq dark" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="block-heading">
            <h2 class="text-info"><?= $receita->nome ?></h2>
        </div>
        <div class="container">
            <?= Html::img($receita->imagem, ['style' => 'display: block;margin-left: auto;margin-right: auto;width: 20%;margin-bottom: 30px;']) ?>
            <p>Ingredientes Necessários:</p>
            <table style="width: 100%">
                <tr>
                    <th>Nome</th>
                    <th>Quantidade Necessária</th>
                    <th>Tipo de Preparação</th>
                </tr>
                <?php
                if (Yii::$app->user->isGuest) {
                    foreach ($ingredientes as $item) { ?>
                    <tr>
                        <td><?= Html::encode($item->nome) ?></td>
                        <td><?= $item->quantnecessaria != 0 ? Html::encode($item->getQuantUnidade()) : '-' ?></td>
                        <td><?= Html::encode($item->getTipoTexto()) ?></td>
                    </tr>
                <?php } } else { ?>
                <?php foreach ($ingredientesdisp as $item) { ?>
                    <tr>
                        <td><i style="color: green" class="fas fa-check-circle"></i> <?= Html::encode($item['nome']) ?>
                        </td>
                        <td><?= $item['quantnecessaria'] != 0 ? Html::encode($item['quantstring']) : '-' ?></td>
                        <td><?= Html::encode(Ingrediente::getTipoTextoId($item['tipopreparacao'])) ?></td>
                    </tr>
                <?php } ?>

                <?php foreach ($ingredientesindisp as $item) { ?>
                    <tr>
                        <td><i style="color: red" class="fas fa-times-circle"></i> <?= Html::encode($item['nome']) ?>
                        </td>
                        <td><?= $item['quantnecessaria'] != 0 ? Html::encode($item['quantstring']) : '-' ?></td>
                        <td><?= Html::encode(Ingrediente::getTipoTextoId($item['tipopreparacao'])) ?></td>
                    </tr>
                <?php } } ?>
            </table>
            <br><br>
            <?= $receita->passos ?>

        </div>
    </section>
</main>
