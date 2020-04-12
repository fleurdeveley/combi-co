<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<section class="row p-2">
    <div class="col-12">
        <h3>Loueur du mois</h3>
    </div>
    <div class="col-xs-12 col-md-6">
        <img src="<?= $renter['picture'] ?>" class="rounded mx-auto d-block" alt="photo loueur français">
    </div>
    <div class="col-xs-12 col-md-6 p-1">
        <div><?= ucfirst($renter['name']) ?></div>
        <div><?= $renter['address'] ?></div>
        <div><?= $renter['zipcode'] . ' ' . ucfirst($renter['city']) ?></div>
        <div><?= $renter['phone'] ?></div>
        <div><?= $renter['website'] ?></div>
        <div><?= $renter['description'] ?></div>
    </div>
</section>

<section class="row p-2">
    <div class="col-xs-12 col-md-12">
        <h3>Zoom sur les combis...</h3>
    </div>

    <?php foreach ($models as $model) : ?>
        <div class="col-xs-12 col-md-6">
            <div class="card border-dark m-1 p-1">
                <img src="<?= $model['picture'] ?>" class="card-img-top-thumbnail" alt="...">
                <div class="card-body text-center">
                    <div><?= $model['model'] . ' ' . $model['nickname']; ?></div>
                    <div><?= $model['name']; ?></div>
                    <div><?= $model['year_start'] . ' à ' . $model['year_end']; ?></div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</section>

<?php $content = ob_get_clean() ?>

<?php require('template.php'); ?>
