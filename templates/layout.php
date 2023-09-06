<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="src/public/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic"
          rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?
    family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
          rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="src/public/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">My First Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?action=postList">Articles</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?action=contact">Contact</a></li>
                <?php if (!empty($_SESSION)) { ?>
                <!--<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?action=logout">Déconnexion</a></li>-->
                    <?php if ($_SESSION['role'] == 1) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4"
                               href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">Administration
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?action=postAdmin">Articles</a></li>
                                <li><a class="dropdown-item" href="index.php?action=commentAdmin">Commentaires</a></li>
                                <li><a class="dropdown-item" href="index.php?action=userAdmin">Utilisateurs</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <!-- If the user is correctly logged, we show a success message -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4"
                           href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false"><?= $_SESSION['firstName'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?action=logout">Déconnexion</a></li>
                        </ul>
                    </li>

                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                            href="index.php?action=register">Inscription</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?action=login">Connexion</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<?= $content ?>
<!-- Footer-->
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="index.php">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="index.php">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse">

                                        </i>
                                    </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/j-lucea">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse">

                                        </i>
                                    </span>
                        </a>
                    </li>
                </ul>
                <div class="small text-center text-muted fst-italic">
                    Copyright &copy; My First Blog 2023</div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
</script>
<!-- Core theme JS-->
<script src="src/public/js/scripts.js"></script>
</body>
</html>

