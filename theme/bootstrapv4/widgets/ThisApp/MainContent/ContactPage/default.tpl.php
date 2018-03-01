<?php

use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;


HtmlPageHelper::css("/theme/bootstrapv4/bootstrap-4/docs/4.0/examples/album/album.css");
$f = $v['form'];
?>


<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt=""
             width="72" height="72">
        <h2>Formulaire de contact</h2>
        <p class="lead">Laissez-nous un message et nous reviendrons vers vous dès que possible.</p>
    </div>


    <?php if ($f['successMessage']): ?>
        <div class="row alert-success">
            <div class="alert-success" style="padding:10px;"><?php echo $f['successMessage']; ?></div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="" method="post" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Prénom <span class="text-muted">(Optionnel)</span></label>
                        <input name="first_name" value="<?php echo htmlspecialchars($f['first_name']['value']); ?>"
                               type="text" class="form-control" id="firstName" placeholder=""
                               required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nom <span class="text-muted">(Optionnel)</span></label>
                        <input name="last_name" value="<?php echo htmlspecialchars($f['last_name']['value']); ?>"
                               type="text"
                               class="form-control" id="lastName" placeholder=""
                               required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input name="email" type="email" value="<?php echo htmlspecialchars($f['email']['value']); ?>"
                           class="form-control" id="email" placeholder="you@example.com">
                    <?php if ($f['email']['error']): ?>
                        <div class="invalid-feedback"><?php echo $f['email']['error']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="address">Message</label>
                    <textarea name="message" class="form-control"><?php echo $f['message']['value']; ?></textarea>
                    <?php if ($f['message']['error']): ?>
                        <div class="invalid-feedback"><?php echo $f['message']['error']; ?></div>
                    <?php endif; ?>
                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</div>