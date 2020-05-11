<?php $title = 'Accueil'; ?>
<?php $metadescription = 'suite au confinement, beaucoup de français souhaitent partir, prendre un bol d\'air 
en campagne ou au bord de mer ou en mode citadin, le fameux combi permet de circuler en toute liberté.'; ?>

<?php ob_start(); ?>

<section class="row my-4 p-2">
    <div class="col-12">
        <h3>Loueur du moment</h3>
    </div>
    <div class="col-xs-12 col-md-6">
        <img src="<?= $renter['picture'] ?>" class="rounded mx-auto d-block" alt="photo loueur français">
    </div>
    <div class="col-xs-12 col-md-6 p-1 text-justify">
        <h5><?= ucfirst($renter['name']) ?></h5>
        <div><?= $renter['address'] ?></div>
        <div><?= $renter['zipcode'] . ' ' . ucfirst($renter['city']) ?></div>
        <div><?= $renter['phone'] ?></div>
        <div><a href="<?= $renter['website'] ?>" target="_blank"><?= $renter['website'] ?> </a></div>
        <div><?= $renter['description'] ?></div>
        <a href="index.php?action=renter&id=<?= $renter['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
    </div>
</section>

<section class="row my-4 p-2">
    <div class="col-xs-12 col-md-12">
        <h3>Zoom sur les combis...</h3>
    </div>

    <?php foreach ($models as $model) : ?>
        <div class="col-xs-12 col-md-6">
            <div class="card border-dark m-1 p-1">
                <img src="<?= $model['picture'] ?>" class="card-img-top-thumbnail" alt="...">
                <div class="card-body text-center">
                    <h5><?= $model['model'] . ' ' . $model['nickname']; ?></h5>
                    <h6><?= $model['name']; ?></h6>
                    <div><?= $model['year_start'] . ' à ' . $model['year_end']; ?></div>
                    <a href="index.php?action=model&id=<?= $model['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</section>

<?php $content = ob_get_clean() ?>

<?php require('template.php'); ?>
