<?php

use Kamille\Mvc\HtmlPageHelper\HtmlPageHelper;


HtmlPageHelper::css("/theme/bootstrapv4/bootstrap-4/docs/4.0/examples/album/album.css");
$items = $v['items'];
?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Mes articles</h1>
            <p class="lead text-muted">Voici une sélection de mes articles. Cliquez sur le bouton "Voir" pour
                accéder au contenu d'un article.</p>
<!--            <p>-->
<!--                <a href="#" class="btn btn-primary my-2">Main call to action</a>-->
<!--                <a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
<!--            </p>-->
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php foreach ($items as $item): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 src="<?php echo $item['img']; ?>"
                                 alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><?php echo ucfirst($item['text']); ?>.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?php echo $item['link']; ?>" type="button"
                                           class="btn btn-sm btn-outline-secondary">Voir</a>
                                    </div>
                                    <small class="text-muted"><?php echo $item['nbMinutes']; ?> mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>