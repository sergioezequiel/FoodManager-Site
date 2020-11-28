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
            <form>
                <div class="form-group"><label>Name</label><input class="form-control" type="text"></div>
                <div class="form-group"><label>Subject *</label><input class="form-control" type="text"></div>
                <div class="form-group"><label>Email *</label><input class="form-control" type="email"></div>
                <div class="form-group"><label>Message *</label><textarea class="form-control"></textarea></div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Send</button>
                </div>
            </form>
        </div>
    </section>
</main>
