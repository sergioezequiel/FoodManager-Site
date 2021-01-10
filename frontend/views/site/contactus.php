<?php

/* @var $this yii\web\View */

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
            <form id="send">
                <div class="form-group">
                    <label for="nome">Name</label>
                    <input id="nome" class="form-control" type="text" name="nome" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="subjet">Subject *</label>
                    <input id="subjet" class="form-control" type="text" name="subjet" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="message">Message 50*</label>
                    <textarea id="message" class="form-control" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Send</button>
                </div>
            </form>
        </div>
    </section>
</main>
