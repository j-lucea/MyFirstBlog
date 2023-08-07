<?php $title = "Contact"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('templates/assetst-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contactez-moi</h1>
                    <span class="subheading">Des questions ? J'ai des réponses.</span>
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
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text"
                                   placeholder="Entrez votre nom..."
                                   data-sb-validations="required" />
                            <label for="name">Nom</label>
                            <div class="invalid-feedback"
                                 data-sb-feedback="name:required">Un nom est nécessaire.
                            </div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email"
                                   placeholder="Entrez votre adresse mail..."
                                   data-sb-validations="required,email" />
                            <label for="email">Addresse mail</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">
                                Une adresse mail est nécessaire.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">
                                Adresse mail invalide.
                            </div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel"
                                   placeholder="Entrez votre numéro de téléphone..."
                                   data-sb-validations="required" />
                            <label for="phone">Téléphone</label>
                            <div class="invalid-feedback"
                                 data-sb-feedback="phone:required">
                                Un numéro de téléphone est nécessaire.
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message"
                                      placeholder="Entrez votre message ici..."
                                      style="height: 12rem" data-sb-validations="required">
                            </textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback"
                                 data-sb-feedback="message:required">
                                Un message est nécessaire.
                            </div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">
                                    https://startbootstrap.com/solution/contact-forms
                                </a>
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
                        <button class="btn btn-primary text-uppercase disabled"
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
