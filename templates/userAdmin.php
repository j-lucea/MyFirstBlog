<?php $title = "Administration des utilisateurs"; ?>

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
                                        <p class="card-text">Identifiant : <em><?= $user->login; ?><br>
                                        Adresse mail : <em><?= $user->mail; ?><br>
                                        Rôle : <em><?php if($user->role) { ?>Administrateur
                                                        <?php } else { ?>Utilisateur<?php } ?><br>
                                        Date de création :  le <?= $user->frenchCreationDate; ?>
                                        <?php
                                        if ($user->frenchCreationDate != $user->frenchUpdateDate)
                                        { ?>
                                            Dernière modification :  le <?= $user->frenchUpdateDate; ?>
                                        <?php } ?>
                                </p>
                                <a href="index.php?action=deleteUser&id=<?= urlencode($user->id) ?>"
                                   class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer définitivement ce compte ?')">Supprimer</a>
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
