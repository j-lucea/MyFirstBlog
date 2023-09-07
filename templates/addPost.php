<?php $title = "Ajout d'un article"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>My First Blog</h1>
                    <span class="subheading"><?= esc_attr($title) ?></span>
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
                <div class="my-5">
                    <!-- Contact Form -->
                    <form id="contactForm" method="post"
                          action="index.php?action=addPost">
                        <div class="form-floating">
                            <input class="form-control" id="title"
                                   name="title" type="text"
                                   maxlength="50" required/>
                            <label for="title">Titre</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="chapo"
                                   name="chapo" type="text"
                                   maxlength="255" required/>
                            <label for="chapo">Chapô</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select" name="category">
                                <option value=0 selected>Choississez une catégorie
                                </option>
                                <?php
                                foreach ($categories as $category) {
                                    ?>
                                <option value=<?= $category->id; ?>>
                                    <?= $category->name; ?>
                                </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <label for="category">Catégorie</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content"
                                      name="content"
                                      style="height: 12rem" required></textarea>
                            <label for="content">Contenu</label>
                        </div>
                        <br />
                        <!-- Return link -->
                        <a class="btn btn-primary text-uppercase"
                           href="index.php?action=postAdmin">Retour
                        </a>
                        <!-- Submit Button-->
                        <button class="btn btn-success text-uppercase"
                                id="submitButton" type="submit">Créer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
