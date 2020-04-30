<?php $title = 'Model'; ?>

<?php ob_start(); ?>

<div class='row my-4 p-2'>
    <div class="col-12 mb-2">
        <h3>Wikicombis</h3>
    </div>
    <?php foreach ($models as $model) : ?>
        <div class='col-sm-12 col-md-4'>
            <div class="card border-dark mb-5 p-1">
                <div class=" card-header bg-perso">
                    <h5><?= $model['model'] . ' ' . $model['nickname'] . ' ' . $model['name'] ?></h5>
                </div>
                <img src="<?= $model['picture'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center"><?= $model['year_start'] . ' à ' . $model['year_end'] ?></p>
                    <a href="index.php?action=model&id=<?= $model['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>