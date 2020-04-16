<?php $title = 'List renters'; ?>

<?php ob_start(); ?>

<div class='row my-3'>
    <a href="index.php?action=addrenter" class="btn btn-success">Ajouter un loueur</a>

    <div class="table-responsive">
        <table class="table table-hover table-bodered" >
            <thead>
                <th>Nom</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th colspan=3>Edition</th>
            </thead>

            <tbody>
                <?php foreach ($renters as $renter) : ?>
                    <tr>
                        <td><?= $renter['name'] ?></td>
                        <td><?= $renter['zipcode'] ?></td>
                        <td><?= $renter['city'] ?></td>
                        <td><a href="index.php?action=readrenter&id=<?= $renter['id']?>" class="btn btn-light">Afficher</a></td>
                        <td><a href="index.php?action=editrenter&id=<?= $renter['id']?>" class="btn btn-warning">Modifier</a></td>
                        <td><a href="index.php?action=deleterenter&id=<?= $renter['id']?>" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                <?php endforeach ?>            
            </tbody>

        </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>