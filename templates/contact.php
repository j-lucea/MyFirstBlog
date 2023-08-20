<?php $title = "Contact"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('src/public/assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contactez-moi</h1>
                    <span class="subheading">Des questions ? J'ai les réponses.</span>
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
                <p>Remplissez ce formulaire pour m'envoyer un message et je reviendrais
                    vers vous dès que possible !
                </p>
                <div class="my-5">
                    <!-- Contact Form -->
                    <form id="contactForm" action="index.php?action=contact" method="post">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text"
                                   placeholder="Entrez votre nom..."
                                   required />
                            <label for="name">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email"
                                   placeholder="Entrez votre adresse mail..."
                                  required />
                            <label for="email">Addresse mail</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel"
                                   placeholder="Entrez votre numéro de téléphone..."
                                   required />
                            <label for="phone">Téléphone</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message"
                                      placeholder="Entrez votre message ici..."
                                      style="height: 12rem" required>
                            </textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">
                                Une erreur est survenue
                            </div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase"
                                id="submitButton" type="submit">Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
