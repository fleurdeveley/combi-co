<?php $title = 'Read renters'; ?>
<?php $robots = '<meta name="robots" content="NOINDEX, NOFOLLOW">'; ?>

<?php ob_start(); ?>

<div class='row my-3'>

    <h3>Afficher un loueur</h3>

    <div class="col-md-10 offset-md-1 mt-3 text-justify">
        <div>id : <?= $renter['id']; ?></div>
        <div>nom : <?= $renter['name']; ?></div>
        <div>adresse : <?= $renter['address']; ?></div>
        <div>code postal : <?= $renter['zipcode']; ?></div>
        <div>ville : <?= $renter['city']; ?></div>
        <div>telephone : <?= $renter['phone']; ?></div>
        <div>site : <?= $renter['website']; ?></div>
        <div>logo : <?= $renter['picture']; ?></div>
        <div>description : <?= $renter['description']; ?></div>
        <a href="listrenters-<?= $renter['id'] ?>" class="btn btn-danger mr-3 mt-3">annuler</a>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>