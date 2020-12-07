<?php

/* @var $this yii\web\View */

$assets = \backend\assets\AppAsset::register($this);
$this->title = 'FoodManager';
?>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control py-4" id="inputEmailAddress" type="email"
                                       placeholder="Enter email address"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control py-4" id="inputPassword" type="password"
                                       placeholder="Enter password"/>
                            </div>
                            <div class="form-group align-items-center justify-content-between mb-0" align="center">
                                <a class="btn btn-primary" href="index.html">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
