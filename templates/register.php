<?php $title = "Inscription"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/post-sample-image.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php echo $title ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php if (isset($successMessage)) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $successMessage; ?>
                </div>
                    <?= header("refresh:2;url=index.php"); ?>
                <?php } else { ?>
                <!-- If error, we show it -->
                    <?php if (isset($errorMessage)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                    <?php endif; ?>
                <div class="my-5">
                    <!-- Subscription Form -->
                    <form id="addForm" method="post"
                          action="index.php?action=register"
                          enctype="multipart/form-data">
                        <div class="form-floating">
                            <input class="form-control" id="lastName"
                                   name="lastName" type="text"
                                   maxlength="50" required/>
                            <label for="lastName">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="firstName"
                                   name="firstName" type="text"
                                   maxlength="50" required/>
                            <label for="firstName">Prénom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="login"
                                   name="login" type="text"
                                   maxlength="255" required/>
                            <label for="login">Identifiant</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password"
                                   name="password" type="text"
                                   maxlength="255" required/>
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="mail"
                                   name="mail" type="email"
                                   maxlength="50" required/>
                            <label for="mail">Adresse mail</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="avatar"
                                   name="avatar" type="file"
                                   maxlength="500"/>
                            <label for="avatar">Avatar</label>
                        </div>
                        <br />
                        <!-- Return link -->
                        <a class="btn btn-primary text-uppercase"
                           href="index.php?action=userAdmin">Retour
                        </a>
                        <!-- Submit Button-->
                        <button class="btn btn-success text-uppercase"
                                id="submitButton" type="submit">S'inscrire
                        </button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
