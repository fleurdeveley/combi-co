<?php $title = 'Model'; ?>

<?php ob_start(); ?>
<h1>Mes supers combis !</h1>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>