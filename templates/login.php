<?php $title = "Connexion"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/post-sample-image.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= strip_tags($title) ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Login form -->
<main class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <form action="index.php?action=login" method="post">
                <!-- If error, we show it -->
                <?php if (!empty($errorMessage)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= strip_tags($errorMessage) ?>
                    </div>
                <?php endif; ?>
                <div class="form-floating">
                    <label for="login" class="form-label">Identifiant
                    </label>
                    <input type="text" class="form-control" id="login"
                           name="login" required>
                </div>
                <div class="form-floating">
                    <label for="password" class="form-label">Mot de passe
                    </label>
                    <input type="password" class="form-control" id="password"
                           name="password" required>
                    </div>
                    <br>
                    <button type="submit" id="submitButton"
                            class="btn btn-primary text-uppercase center-block">
                        Envoyer
                    </button>
                </form>
                <br>
        </div>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?= require 'layout.php' ?>
