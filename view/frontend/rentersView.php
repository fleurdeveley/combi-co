<?php $title = 'Renter'; ?>

<?php ob_start(); ?>
<h1>Mes supers loueurs !</h1>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>