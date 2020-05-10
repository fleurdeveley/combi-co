<?php $title = 'Newsletter'; ?>

<?php ob_start(); ?>

    <div class='row my-4 p-2'>
        <div class='col-12'>
        <h3><?= $text; ?></h3>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>