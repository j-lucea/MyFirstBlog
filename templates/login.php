<?php $title = "Connexion";?>

<!-- Form valid -->
<?php
/*if (isset($_POST['mail']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['mail'] === $_POST['mail'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'email' => $user['mail'],
                ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['mail'],
                $_POST['password']
            );
        }
    }
}*/?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>My First Blog</h1>
                    <span class="subheading">Découvrez ce qui me passionne</span>
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
            <form action="index.php" method="post">
                <!-- If error, we show it -->
                <?php if(isset($errorMessage)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="vous@exemple.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
                <!-- If the user is correctly logged, we show a success message -->
            <?php else: ?>
                <div class="alert alert-success" role="alert">
                    Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
