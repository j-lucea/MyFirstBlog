<?php $title = "Commentaires"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Administration</h1>
                    <span class="subheading"><?php $title; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            foreach ($comments as $comment) {
                ?>
                <!-- Posts preview-->
                <!--Card-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php $comment->author; ?></h5>
                                <p class="card-text"><?php $comment->content; ?></p>
                                <p class="card-text">Publié par
                                    <em><?php $comment->author; ?><br>
                                        <?php
                                        if ($comment->frenchCreationDate == $comment->frenchUpdateDate) { ?>
                                            le <?php $comment->frenchCreationDate; ?>
                                        <?php } else { ?>
                                            Modifié le <?php $comment->frenchUpdateDate; ?>
                                        <?php } ?>
                                </p>
                                <?php if (empty($comment->status)) : ?>
                                    <a href="index.php?action=activateComment&id=<?= urlencode($comment->id) ?>"
                                        class="btn btn-success">Valider</a>
                                <?php endif; ?>
                                <a href="index.php?action=deleteComment&id=<?= urlencode($comment->id) ?>"
                                   class="btn btn-danger"
                                   onclick="return confirm('Voulez-vous supprimer définitivement cet article ?')">
                                   Supprimer
                                </a>
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
</main>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
