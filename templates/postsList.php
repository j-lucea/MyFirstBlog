<?php $title = "Liste des articles"; ?>

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
<!-- If the user is correctly logged, we show a success message -->
<?php if(isset($_SESSION)): ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $_SESSION['firstName']; ?> et bienvenue sur le site !

    </div>
<?php endif; ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            foreach ($posts as $post) {
                ?>
                <!-- Posts preview-->
                <div class="post-preview">
                    <a href="index.php?action=post&id=<?= urlencode($post->id) ?>">
                        <h2 class="post-title"><?= htmlspecialchars($post->title); ?></h2>
                        <h3 class="post-subtitle">
                            <?= nl2br(htmlspecialchars($post->chapo)); ?>
                        </h3>
                    </a>
                    <p class="post-meta">
                        Publié par
                        <a href="#!"><em><?= $post->author; ?></em></a>
                        <em>le <?= $post->frenchCreationDate; ?></em>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
