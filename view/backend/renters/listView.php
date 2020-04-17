<?php $title = 'List renters'; ?>

<?php ob_start(); ?>

<div class='row my-3'>
    <a href="index.php?action=addrenter" class="btn btn-success">Ajouter un loueur</a>

    <div class="table-responsive">
        <table class="table table-hover table-bodered">
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
                        <td><a href="index.php?action=readrenter&id=<?= $renter['id'] ?>" class="btn btn-light">Afficher</a></td>
                        <td><a href="index.php?action=editrenter&id=<?= $renter['id'] ?>" class="btn btn-warning">Modifier</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Supprimer</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Supprimer un loueur</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûre de vouloir supprimer <?= $renter['name'] ?> ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-success">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    </td>
    </tr>

<?php endforeach ?>
</tbody>

</table>
</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>