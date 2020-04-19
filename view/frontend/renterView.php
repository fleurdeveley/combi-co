<?php $title = 'Renter'; ?>

<?php ob_start(); ?>

<div class='row my-4 p-2'>
    <div class='col-6 offset-3'>
        <div class="card box-shadows-6px-gray">
            <div class=" card-header bg-primary text-white">
                <?= $renter['name'] ?>
            </div>
            <img src="<?= $renter['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center"><?= $renter['address'] ?></p>
                <p class="card-text text-center"><?= $renter['zipcode'] . ' ' . $renter['city'] ?></p>
                <p class="card-text text-center"><?= $renter['phone'] ?></p> </br>
                <p class="card-text text-center"><?= $renter['website'] ?></p> </br>
                <p class="card-text text-justify"><?= $renter['description'] ?></p>
                <h6>Modèles disponibles :</h6>
                <ul>
                    <?php foreach ($renterModels as $renterModel) : ?>
                        <li class="card-text text-justify"><?= $renterModel['model'] .' '. $renterModel['nickname'] .' '. $renterModel['name'] ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>