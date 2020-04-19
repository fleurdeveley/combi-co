<?php $title = 'Model'; ?>

<?php ob_start(); ?>
<div class='row my-4 p-2'>
    <div class='col-8 offset-2'>
        <div class="card box-shadows-6px-gray">
            <div class=" card-header bg-primary text-white">
                <?= $model['model'] . ' ' . $model['nickname'] . ' ' . $model['name'] ?>
            </div>
            <img src="<?= $model['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center"><?= 'de ' . $model['year_start'] . ' à ' . $model['year_end'] ?></p>
                <p class="card-text text-justify"><?= $model['description'] ?></p>
                <h5>Loueurs ayant ce modèle :</h5>

                <div class='row my-4 p-2'>

                        <?php foreach ($modelRenters as $modelRenter) : ?>
                            <div class='col-6'>
                                <div class="card mb-5 border-dark">
                                    <div class=" card-header bg-primary text-white">
                                        <?= $modelRenter['name'] ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center"><?= $modelRenter['address'] ?></p>
                                        <p class="card-text text-center"><?= $modelRenter['zipcode'] . ' ' . $modelRenter['city'] ?></p>
                                        <p class="card-text text-center"><?= $modelRenter['address'] ?></p>
                                        <p class="card-text text-center"><?= $modelRenter['website'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>

</div>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); ?>