<?php $title = "Contact"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image:
        url('src/public/assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contactez-moi</h1>
                    <span class="subheading">Des questions ?
                        J'ai les réponses.</span>
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
                <p>Remplissez ce formulaire pour m'envoyer un message et je
                    reviendrais vers vous dès que possible !
                </p>
                <div class="my-5">
                    <!-- Contact Form -->
                    <form id="contactForm" method="post" action="index.php?action=contact">
                        <div class="form-floating">
                            <input class="form-control" id="name"
                                   name="name" type="text"
                                   required />
                            <label for="name">Nom</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email"
                                   name="email" type="email"
                                  required />
                            <label for="email">Adresse mail</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="subject"
                                   name="subject" type="text"
                                   required />
                            <label for="subject">Sujet</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message"
                                      name="message"
                                      style="height: 12rem" required>
                            </textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
<!--                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission
                                    successful!</div>
                            </div>
                        </div>-->
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
<!--                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">
                                Une erreur est survenue
                            </div>
                        </div>-->
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
