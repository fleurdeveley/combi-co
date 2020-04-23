<?php $title = 'Model'; ?>

<?php ob_start(); ?>
<div class='row my-4 p-2'>
    <div class='col-12-md col-md-8'>
        <div class="card box-shadows-6px-gray">
            <div class=" card-header bg-primary text-white">
                <?= $model['model'] . ' ' . $model['nickname'] . ' ' . $model['name'] ?>
            </div>
            <img src="<?= $model['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center"><?= 'de ' . $model['year_start'] . ' à ' . $model['year_end'] ?></p>
                <p class="card-text text-justify"><?= $model['description'] ?></p>

            </div>
        </div>


    </div>
    <div class="col-sm-12 col-md-4">
    <h5>Loueurs ayant ce modèle :</h5>

        <?php foreach ($modelRenters as $modelRenter) : ?>
                <div class='col-12 my-3'>
                    <div class="card border-dark">
                        <div class=" card-header bg-primary text-white">
                            <h5><?= $modelRenter['name'] ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center"><?= $modelRenter['address'] ?></p>
                            <p class="card-text text-center"><?= $modelRenter['zipcode'] . ' ' . $modelRenter['city'] ?></p>
                            <p class="card-text text-center"> <a href="<?= $modelRenter['website'] ?>" target="_blank"><?= $modelRenter['website'] ?> </a></p>
                            <a href="index.php?action=renter&id=<?= $modelRenter['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


    </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>