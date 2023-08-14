<?php $title = "Connexion";?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>My First Blog</h1>
                    <span class="subheading">Découvrez ce qui me passionne
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Login form -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!--If unidentified user, display the form-->
            <?php if(!isset($loggedUser)): ?>
                <form action="index.php?action=login" method="post">
                    <!-- If error, we show it -->
                    <?php if(isset($errorMessage)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-floating">
                        <label for="login" class="form-label">Identifiant
                        </label>
                        <input type="login" class="form-control" id="login"
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
                <!-- If the user is correctly logged, we show a success message -->
            <?php else: ?>
                <div class="alert alert-success" role="alert">
                    Bonjour <?php echo $loggedUser->firstName; ?> et bienvenue sur le site !

                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
