<?php $title = 'Read renters'; ?>

<?php ob_start(); ?>

<div class='row my-3'>

    <div class="col-md-12 text-justify">
        <a href="index.php?action=listrenters" class="btn btn-success mb-2">Liste des loueurs</a>

        <h3>Afficher un loueur</h3>

        <div>id : <?= $renter['id']; ?></div>
        <div>nom : <?= $renter['name']; ?></div>
        <div>adresse : <?= $renter['address']; ?></div>
        <div>code postal : <?= $renter['zipcode']; ?></div>
        <div>ville : <?= $renter['city']; ?></div>
        <div>site : <?= $renter['website']; ?></div>
        <div>telephone : <?= $renter['phone']; ?></div>
        <div>logo : <?= $renter['picture']; ?></div>
        <div>description : <?= $renter['description']; ?></div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>