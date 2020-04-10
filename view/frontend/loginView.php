<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<h1>Mon administrateur !</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
