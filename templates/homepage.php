<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead"
        style="background-image: url('src/public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= esc_attr($title) ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="container px-4">
                <section class="my-5">
                    <div class="container">
                        <div class="row gy-4 align-items-center">
                            <div class="col-12 col-md-6">
                                <h1 class="fw-bold">Jonathan Lucea</h1>
                                <h2 class="fw-light">Développeur Web</h2>
                                <p>Je suis là pour concrétiser vos projets web</p>
                                <a href="src/public/assets/img/cv.pdf"
                                   target="_blank"
                                   class="btn btn-primary mt-5">
                                    Mon parcours
                                </a>
                            </div>
                            <div class="col-12 col-md-6">
                                <img src="src/public/assets/img/photo.jpg"
                                     alt="Photo de Jonathan Lucea"
                                     width="100%">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Divider-->
                <hr class="my-4" />
                <?php
                foreach ($posts as $post) {
                    ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="index.php?action=post&id=<?= urlencode($post->id) ?>">
                            <h2 class="post-title"><?= esc_attr($post->title) ?></h2>
                            <h3 class="post-subtitle"><?= htmlspecialchars($post->chapo) ?></h3>
                        </a>
                        <p class="post-meta">
                            Publié par
                            <em><?= esc_attr($post->author) ?></em>
                            <em>le <?= esc_attr($post->frenchCreationDate) ?></em>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php
                }
                ?>
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase"
                       href="index.php?action=postList">
                        Plus d'articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
