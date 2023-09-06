<?php $title = $post->title; ?>

<?php ob_start(); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url(<?= htmlspecialchars($post->image) ?>)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= $post->title ?></h1>
                    <h2 class="subheading"><?= $post->chapo ?></h2>
                    <span class="meta">
                                Publié par <?= $post->author ?>
                                <?php
                                if ($post->frenchCreationDate == $post->frenchUpdateDate) { ?>
                                    <em>le <?= $post->frenchCreationDate; ?></em>
                                <?php } else { ?>
                                    <br><em>Mis à jour le <?= $post->frenchUpdateDate; ?></em>
                                <?php } ?>
                            </span><br>
                    <h3>Catégorie : <?= $post->category ?></h3>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<main class="mb-4">
    <article class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?= nl2br($post->content) ?></p>
                <?php
                if ($comments) {
                    ?>
                        <h2 class="section-heading">Commentaires</h2>
                    <?php
                    foreach ($comments as $comment) {
                        ?>
                            <p><strong><?= $comment->author ?></strong>
                                le <?= $comment->frenchCreationDate ?>
                            <?php if (!empty($_SESSION) && $comment->author == $_SESSION['firstName']) {
                                ?>(<a
                                        href="index.php?action=updateComment&id=<?=
                                        $comment->id ?>">Modifier</a>)
                            <?php } ?>
                            </p>
                            <p><?= nl2br($comment->content) ?></p>
                            <?php
                    }
                }
                ?>
                <?php if (!empty($_SESSION)) { ?>
                <div class="my-5">
                    <form action="index.php?action=addComment&id=<?= $post->id ?>"
                          method="post">
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="comment"
                                      style="height: 12rem" required></textarea>
                            <label for="comment">Qu'en pensez-vous ?</label>
                            <div class="invalid-feedback"
                                 data-sb-feedback="comment:required">
                                Veuillez saisir un commentaire.</div>
                        </div>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton"
                                type="submit">Envoyer</button>
                    </form>
                </div>
                <?php } else { ?>
                <p>Veuillez vous connecter pour commenter nos articles</p>
                    <!-- Connexion link -->
                    <a class="btn btn-primary text-uppercase" href="index.php?action=login">
                        Se connecter</a>
                <?php } ?>
            </div>
        </div>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
