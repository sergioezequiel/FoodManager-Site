<?php

/* @var $this yii\web\View
 * @var $ingredientes \app\models\Ingrediente
 * @var $receita \app\models\Ingrediente
 */

use yii\helpers\Html;

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page faq-page">
    <section class="clean-block clean-faq dark">
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
                <?php foreach ($ingredientes as $item) { ?>
                <tr>
                    <td><?= Html::encode($item->nome) ?></td>
                    <td><?= $item->quantnecessaria != 0 ? Html::encode($item->getQuantUnidade()) : '-' ?></td>
                    <td><?= Html::encode($item->getTipoTexto()) ?></td>
                </tr>
                <?php } ?>
            </table>
            <br><br>
            <?= $receita->passos ?>
        </div>
    </section>
</main>
