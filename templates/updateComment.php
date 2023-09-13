<?php $title = "Modification du commentaire"; ?>

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
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Modification du commentaire
                </p>
                <div class="my-5">
                    <!-- Contact Form -->
                    <form method="post"
                          action="index.php?action=updateComment&id=
                          <?= urlencode($comment->id) ?>">
                        <div class="form-floating">
                            <textarea class="form-control" id="content"
                                      name="content"
                                      style="height: 12rem"
                                      required><?php $comment->content; ?></textarea>
                            <label for="content">Contenu</label>
                        </div>
                        <br />
                        <input type="hidden" id="postId" name="postId"
                               value="<?= urlencode($comment->post) ?>" />
                        <!-- Return link -->
                        <a class="btn btn-primary text-uppercase"
                           href="index.php?action=post&id=<?= urlencode($comment->post) ?>">
                            Retour</a>
                        <!-- Submit Button-->
                        <button class="btn btn-success text-uppercase"
                                id="submitButton" type="submit">Modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
