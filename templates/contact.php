<?php $title = "Contact"; ?>

<?php ob_start(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image:
        url('src/public/assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1><?= addslashes(string: $title) ?></h1>
                    <span class="subheading">Des questions ?
                        J'ai les réponses.
                    </span>
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
                                      style="height: 12rem" required></textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />
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

<?= require 'layout.php' ?>
