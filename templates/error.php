<?php $title = "Erreur"; ?>

<?php ob_start(); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>My First Blog</h1>
                    <span class="subheading"><?php echo $title ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- If the user is correctly logged, we show a success message -->
            <?php if(!empty($_SESSION)): ?>
                <div class="alert alert-success" role="alert">
                    Bonjour <?php echo $_SESSION['firstName']; ?>

                </div>
            <?php endif; ?>
            <p>Une erreur est survenue : <?= $errorMessage ?></p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
