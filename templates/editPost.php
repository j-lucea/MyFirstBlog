<?php $title = "Modification d'un article"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/about-bg.jpg')">
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
                <p>Modification d'un article
                </p>
                <div class="my-5">
                    <!-- Contact Form -->
                    <form id="contactForm" method="post"
                          action="index.php?action=editPost&id=<?= urlencode($post->id) ?>">
                        <div class="form-floating">
                            <input class="form-control" id="title"
                                   name="title" type="text"
                                   value="<?= htmlspecialchars($post->title) ?>"
                                   maxlength="50" required/>
                            <label for="title">Titre</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="chapo"
                                   name="chapo" type="text"
                                   value="<?= htmlspecialchars($post->chapo) ?>"
                                   maxlength="255" required/>
                            <label for="chapo">Chapô</label>
                        </div>
<!--                        <div class="form-floating">
                            <input class="form-control" id="image"
                                   name="image" type="file"
                                   maxlength="500"/>
                            <label for="image">Image</label>
                        </div>-->
                        <div class="form-floating">
                            <select class="form-select" name="category">
                                <?php
                                foreach ($categories as $category) {
                                    ?>
                                <option value=<?= htmlspecialchars($category->id) ?>
                                    <?php if ($category->id == $post->category) { ?>
                                        selected>
                                    <?php } else { ?>
                                        >
                                    <?php } ?>
                                    <?= htmlspecialchars($category->name) ?>
                                </option>
                                <?php } ?>
                            </select>
                            <label for="category">Catégorie</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content"
                                      name="content"
                                      style="height: 12rem"
                                      required><?= htmlspecialchars($post->content) ?></textarea>
                            <label for="content">Contenu</label>
                        </div>
                        <br />
                        <!-- Return link -->
                        <a class="btn btn-primary text-uppercase" href="index.php?action=postAdmin">
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

<?php require('layout.php') ?>
