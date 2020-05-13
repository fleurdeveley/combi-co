<?php $title = 'Model'; ?>
<?php $metadescription = 'Prenez en main votre combi : que l\'aventure commence'; ?>

<?php ob_start(); ?>
<div class='row my-4 p-2'>
    <div class='col-12-md col-md-8'>
        <div class="card box-shadows-6px-gray">
            <div class=" card-header bg-perso">
                <h3><?= $model['model'] . ' ' . $model['nickname'] . ' ' . $model['name'] ?></h3>
            </div>
            <img src="<?= $model['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center"><?= 'de ' . $model['year_start'] . ' à ' . $model['year_end'] ?></p>
                <p class="card-text text-justify"><?= $model['description'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <h5>Loueur(s) ayant ce modèle :</h5>

        <?php foreach ($modelRenters as $modelRenter) : ?>
            <div class='col-12 my-3'>
                <div class="card border-dark p-1">
                    <div class=" card-header bg-perso">
                        <h5><?= $modelRenter['name'] ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center"><?= $modelRenter['address'] ?></p>
                        <p class="card-text text-center"><?= $modelRenter['zipcode'] . ' ' . $modelRenter['city'] ?></p>
                        <p class="card-text text-center"> <a href="<?= $modelRenter['website'] ?>" target="_blank"><?= $modelRenter['website'] ?> </a></p>
                        <a href="renter-<?= $modelRenter['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>