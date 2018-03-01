<?php

use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;


HtmlPageHelper::css("/theme/bootstrapv4/bootstrap-4/docs/4.0/examples/album/album.css");


?>


<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt=""
             width="72" height="72">
        <h2>Formulaire de contact</h2>
        <p class="lead">Laissez-nous un message et nous reviendrons vers vous dès que possible.</p>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Prénom <span class="text-muted">(Optionnel)</span></label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nom <span class="text-muted">(Optionnel)</span></label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Message</label>
                    <textarea class="form-control"></textarea>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>




                <button class="btn btn-primary btn-lg btn-block" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</div>