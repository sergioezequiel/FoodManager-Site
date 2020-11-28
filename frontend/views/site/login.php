<?php

/* @var $this yii\web\View */

$assets = \frontend\assets\FoodmanAsset::register($this);
$this->title = 'FoodManager';
?>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
                <p>Faça o seu login:</p>
            </div>
            <form>
                <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email"
                                                                               id="email"></div>
                <div class="form-group"><label for="password">Password</label><input class="form-control"
                                                                                     type="password" id="password">
                </div>
                <div class="form-group">
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label
                                class="form-check-label" for="checkbox">Remember me</label></div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </form>
        </div>
    </section>
</main>
