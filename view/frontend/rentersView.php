<?php $title = 'Renters'; ?>

<?php ob_start(); ?>

<div class='row my-4 p-2'>
    <div class="col-12 mb-2">
        <h3>Les Loueurs</h3>
    </div>
    <?php foreach ($renters as $renter) : ?>
        <div class='col-4'>
            <div class="card mb-5 border-dark">
                <div class=" card-header bg-primary text-white">
                    <?= $renter['name'] ?>
                </div>
                <img src="<?= $renter['picture'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">
                        <?= $renter['address'] ?></p>
                    <p class="card-text text-center"><?= $renter['zipcode'] . ' ' . $renter['city'] ?></p>
                    <a href="index.php?action=renter&id=<?= $renter['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>