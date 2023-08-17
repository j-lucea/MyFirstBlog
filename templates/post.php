<?php $title = $post->title; ?>

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
                <?php
                    if ($comments) {
                        ?>
                        <h2 class="section-heading">Commentaires</h2>
                        <?php
                        foreach ($comments as $comment) {
                            ?>
                            <p><strong><?= htmlspecialchars($comment->author) ?></strong>
                                le <?= $comment->frenchCreationDate ?> (<a
                                        href="index.php?action=updateComment&id=<?=
                                        $comment->identifier ?>">modifier</a>)</p>
                            <p><?= nl2br(htmlspecialchars($comment->content)) ?></p>
                            <?php
                        }
                    }
                ?>
<!--                <form action="index.php?action=addComment&id=<?php /*= $post->id */?>" method="post">
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
                </form>-->
                <div class="my-5">
                    <form action="index.php?action=addComment&id=<?= $post->id ?>"
                          method="post">
                        <div class="form-floating">
                            <textarea class="form-control" id="comment"
                                      placeholder="Saisissez votre commentaire ici..."
                                      style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="comment">Qu'en pensez-vous ?</label>
                            <div class="invalid-feedback"
                                 data-sb-feedback="comment:required">
                                Veuillez saisir un commentaire.</div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessComment">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">
                                    https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center
                        text-danger mb-3">Une erreur est survenue !</div></div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton"
                                type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
