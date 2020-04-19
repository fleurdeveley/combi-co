<?php $title = 'Read renters'; ?>

<?php ob_start(); ?>

<div class='row my-3'>

    <h3>Afficher un loueur</h3>

    <div class="col-md-10 offset-md-1 mt-3 text-justify lh-2">
        <div>id : <?= $renter['id']; ?></div>
        <div>nom : <?= $renter['name']; ?></div>
        <div>adresse : <?= $renter['address']; ?></div>
        <div>code postal : <?= $renter['zipcode']; ?></div>
        <div>ville : <?= $renter['city']; ?></div>
        <div>telephone : <?= $renter['phone']; ?></div>
        <div>site : <?= $renter['website']; ?></div>
        <div>logo : <?= $renter['picture']; ?></div>
        <div>description : <?= $renter['description']; ?></div>
        <a href="index.php?action=listrenters&id=<?= $renter['id'] ?>" class="btn btn-danger mr-3">annuler</a> <button type="submit" class="btn btn-success">enregistrer</button>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>