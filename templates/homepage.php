<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php echo $title ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="container px-4">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <img src="src/public/assets/img/photo.jpg" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h2>Lucea Jonathan</h2>
                            <p>Le développeur Symfony qui saura donner un élan de popularité à votre entreprise</p>
                            <div class="d-flex justify-content-end mb-4">
                                <a class="btn btn-primary text-uppercase"
                                   href="src/public/assets/img/cv.pdf">Mon CV
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="container px-4">
                        <div class="row gx-5">
                            <div class="col">
                                <div class="p-3 border bg-light"><img src="src/public/assets/img/photo.jpg" class="img-thumbnail" alt="..."></div>
                            </div>
                            <div class="col">
                                <div class="p-3 border bg-light"><div class="p-3">
                                        <h2>Lucea Jonathan</h2>
                                        <p>Le développeur Symfony qui saura concrétiser vos projets de sites web</p>
                                        <div class="d-flex justify-content-end mb-4">
                                            <a class="btn btn-primary text-uppercase"
                                               href="src/public/assets/img/cv.pdf">Mon CV
                                            </a>
                                        </div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <?php
                foreach ($posts as $post) {
            ?>
            <!-- Post preview-->
            <div class="post-preview">
                <a href="index.php?action=post&id=<?= urlencode($post->id) ?>">
                    <h2 class="post-title"><?= htmlspecialchars($post->title); ?></h2>
                    <h3 class="post-subtitle"><?= nl2br(htmlspecialchars($post->chapo)); ?></h3>
                </a>
                <p class="post-meta">
                    Publié par
                    <em><?= $post->author; ?></em>
                    <em>le <?= $post->frenchCreationDate; ?></em>
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
                   href="index.php?action=postList">Plus d'articles
                </a>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
