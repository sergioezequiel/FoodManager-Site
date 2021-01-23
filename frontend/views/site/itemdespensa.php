<?php

/* @var $this yii\web\View */
/* @var $despensa app\models\itensdespensa */
$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page faq-page">
    <section class="clean-block clean-faq dark" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Despensa</h2>
            </div>
            <div class="block-content">
                <div class="faq-item">
                    <h4 class="question">Vista básica dos produtos:</h4>
                    <table style="width:100%">
                        <tr>
                            <th>Nome:</th>
                            <th>Quantidade:</th>
                            <th>Validade:</th>
                        </tr>
                        <?php
                        foreach ($despensa as $item) {
                            echo '<tr style="border: 1px solid #dddddd";>' . '<td>' . $item->nome . '</td>' . '<td>' . $item->getQuantidadeUnidade() . '</td>' . '<td>' . $item->validade . '</td>' . '</tr>';
                        }
                        ?>
                    </table>
                </div>

            </div>
            <p>Disclaimer: Se quer visualizar a lista completa verifique na aplicação android.</p>
        </div>
    </section>
</main>
