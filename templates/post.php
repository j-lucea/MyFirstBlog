<?php $title = $post->title; ?>

<?php ob_start(); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url(<?= addslashes($post->image) ?>)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= htmlspecialchars($post->title, ENT_QUOTES) ?></h1>
                    <h2 class="subheading"><?= htmlspecialchars($post->chapo, ENT_QUOTES) ?></h2>
                    <span class="meta">
                                Publié par <?= htmlspecialchars($post->author, ENT_QUOTES) ?>
                                <?php
                                if ($post->frenchCreationDate == $post->frenchUpdateDate) { ?>
                                    <em>le <?= htmlspecialchars($post->frenchCreationDate, ENT_QUOTES) ?></em>
                                <?php } else { ?>
                                    <br><em>Mis à jour le <?= htmlspecialchars($post->frenchUpdateDate, ENT_QUOTES) ?></em>
                                <?php } ?>
                            </span><br>
                    <h3>Catégorie : <?= htmlspecialchars($category->name, ENT_QUOTES) ?></h3>
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
                <p><?= htmlspecialchars($post->content, ENT_QUOTES) ?></p>
                <?php
                if ($comments) {
                    ?>
                        <h2 class="section-heading">Commentaires</h2>
                    <?php
                    foreach ($comments as $comment) {
                        ?>
                            <p><strong><?= htmlspecialchars($comment->author, ENT_QUOTES) ?></strong>
                                le <?= htmlspecialchars($comment->frenchCreationDate, ENT_QUOTES) ?>
                            <?php if (!empty($_SESSION) && $comment->author == $_SESSION['firstName']) {
                                ?>(<a
                                        href="index.php?action=updateComment&id=<?=
                                        urlencode($comment->id) ?>">Modifier</a>)
                            <?php } ?>
                            </p>
                            <p><?= htmlspecialchars($comment->content, ENT_QUOTES) ?></p>
                            <?php
                    }
                }
                ?>
                <?php if (!empty($_SESSION)) { ?>
                <div class="my-5">
                    <form action="index.php?action=addComment&id=<?= urlencode($post->id) ?>"
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

<?= require 'layout.php' ?>
