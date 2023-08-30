<?php $title = "Gestion des utilisateurs"; ?>

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
<!-- If the user is correctly logged, we show a success message -->
<?php if(isset($_SESSION)): ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $_SESSION['firstName']; ?> et bienvenue sur le site !

    </div>
<?php endif; ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <a href="index.php?action=addPost" class="btn btn-success">Ajouter un utilisateur
            </a>
            <!-- Divider-->
            <hr class="my-4" />
                <?php
                    foreach ($users as $user) {
                ?>
                <!-- Posts preview-->
                <!--Card-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($user->firstName); ?>
                                    <?= htmlspecialchars($user->lastName); ?></h5>
                                <p class="card-text"><em><?= $user->mail; ?><br>
                                        <?php
                                        if ($user->frenchCreationDate == $user->frenchUpdateDate)
                                        { ?>
                                            Depuis le <?= $user->frenchCreationDate; ?>
                                        <?php } ?>
                                </p>
                                <a href="index.php?action=editPost&id=<?= urlencode($user->id) ?>"
                                   class="btn btn-warning">Modifier</a>
                                <a href="index.php?action=deletePost&id=
                        <?= urlencode($user->id) ?>"
                                   class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
