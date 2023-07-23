<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url(<?= htmlspecialchars($post->image) ?>)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?= htmlspecialchars($post->title) ?></h1>
                    <h2 class="subheading"><?= htmlspecialchars($post->chapo) ?></h2>
                    <span class="meta">
                                Publié par <?= htmlspecialchars($post->author) ?>
                                <em>le <?= $post->frenchCreationDate ?></em>
                            </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
                <h2 class="section-heading">Commentaires</h2>

                <?php
                foreach ($comments as $comment) {
                    ?>
                    <p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->frenchCreationDate ?> (<a href="index.php?action=updateComment&id=<?= $comment->identifier ?>">modifier</a>)</p>
                    <p><?= nl2br(htmlspecialchars($comment->content)) ?></p>
                    <?php
                }
                ?>
                <h2 class="section-heading">Qu'en pensez-vous ?</h2>
                <form action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post">
                    <div>
                        <label for="author">Auteur</label><br />
                        <input type="text" id="author" name="author" />
                    </div>
                    <div>
                        <label for="comment">Commentaire</label><br />
                        <textarea id="comment" name="comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
