<?php $title = 'List renters'; ?>
<?php $robots = '<meta name="robots" content="NOINDEX, NOFOLLOW">'; ?>

<?php ob_start(); ?>

<div class='row my-3'>
    <a href="addrenter" class="btn btn-success mr-3">Ajouter un loueur</a> <a href="deconnexion" class="btn btn-danger">Déconnexion</a>

    <div class="table-responsive">
        <table class="table table-hover table-bodered">
            <thead>
                <th class="table-active">Nom</th>
                <th class="table-active">Code Postal</th>
                <th class="table-active">Ville</th>
                <th class="table-active" colspan=3>Edition</th>
            </thead>

            <tbody>
                <?php foreach ($renters as $renter) : ?>
                    <tr>
                        <td><?= $renter['name'] ?></td>
                        <td><?= $renter['zipcode'] ?></td>
                        <td><?= $renter['city'] ?></td>
                        <td><a href="readrenter-<?= $renter['id'] ?>" class="btn btn-light">Afficher</a></td>
                        <td><a href="editrenter-<?= $renter['id'] ?>" class="btn btn-warning">Modifier</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?= $renter['id'] ?>">Supprimer</button>
                            <div class="modal fade" id="modal-<?= $renter['id'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="modal-<?= $renter['id'] ?>-Label">Supprimer un loueur</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûre de vouloir supprimer <?= $renter['name'] ?> ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                            <a class="btn btn-success" href="deleterenter-<?= $renter['id'] ?>">Valider</a>
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