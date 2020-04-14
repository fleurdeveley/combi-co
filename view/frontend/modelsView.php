<?php $title = 'Model'; ?>

<?php ob_start(); ?>
<div class='row my-4 p-2'>

    <?php foreach ($models as $model) : ?>
        <div class='col-4'>
            <div class="card mb-5 border-dark">
                <div class=" card-header bg-primary text-white">
                    <?= $model ['model'].' '.$model['nickname'].' '.$model['name'] ?>
                </div>
                <img src="<?= $model['picture'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center"><?= $model['year_start'].' à '.$model['year_end'] ?></p>
                    <a href="index.php?action=model&id=<?= $model['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>