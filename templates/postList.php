<?php $title = "Articles"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= strip_tags($title) ?></h1>
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
            foreach ($posts as $post) {
                ?>
                <!-- Posts preview-->
                <div class="post-preview">
                    <a href="index.php?action=post&id=<?= urlencode($post->id) ?>">
                        <h2 class="post-title"><?= strip_tags($post->title) ?></h2>
                        <h3 class="post-subtitle">
                            <?= strip_tags($post->chapo) ?>
                        </h3>
                    </a>
                    <p class="post-meta">
                        Publié par
                        <em><?= strip_tags($post->author) ?></em>
                        <?php
                        if ($post->frenchCreationDate == $post->frenchUpdateDate) { ?>
                            <em>le <?= strip_tags($post->frenchCreationDate) ?></em>
                        <?php } else { ?>
                            <br><em>Mis à jour le <?= strip_tags($post->frenchUpdateDate) ?></em>
                        <?php } ?>
                    </p>
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

<?= require 'layout.php' ?>
