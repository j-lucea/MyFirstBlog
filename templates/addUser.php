<?php $title = "Ajout d'un utilisateur"; ?>

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
                <p>Ajout d'un utilisateur
                </p>
                <div class="my-5">
                    <!-- Add Form -->
                    <form id="addForm" method="post"
                          action="index.php?action=addUser">
                        <div class="form-floating">
                            <input class="form-control" id="lastName"
                                   name="lastName" type="text"
                                   maxlength="50" required/>
                            <label for="lastName">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="firstName"
                                   name="firstName" type="text"
                                   maxlength="50" required/>
                            <label for="name">Prénom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="login"
                                   name="login" type="text"
                                   maxlength="255" required/>
                            <label for="login">Identifiant</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="mail"
                                   name="mail" type="email"
                                   maxlength="50" required/>
                            <label for="lastName">Adresse mail</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select" name="category">
                                <option value="false" selected>Choississez un rôle
                                </option>
                                    <option value=false>Utilisateur</option>
                                    <option value=true>Administrateur</option>
                            </select>
                            <label for="name">Rôle</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="image"
                                   name="image" type="file"
                                   maxlength="500"/>
                            <label for="image">Image</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="content"
                                      name="content"
                                      style="height: 12rem" required>
                            </textarea>
                            <label for="message">Contenu</label>
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
