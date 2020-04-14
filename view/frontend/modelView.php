<?php $title = 'Model'; ?>

<?php ob_start(); ?>
<div class='row my-4 p-2'>
    <div class='col-12'>
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

</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>