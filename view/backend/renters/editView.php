<?php $title = 'Edit renters'; ?>

<?php ob_start(); ?>

<div class='row mt-3'>
    <h3>Editer un loueur</h3>

    <div class="col-md-8 offset-md-3 my-3 text-justify">

        <form method="post" action="index.php?action=editrenter&id=<?= $renter['id']; ?>" id="editrenter">
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="name">Nom</label>
                    <input type="name" class="form-control" id="name" name="name" value="<?= $renter['name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="adress">Adresse</label>
                    <input type="address" class="form-control" id="address" name="address" value="<?= $renter['address']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="zipcode">Code postal</label>
                    <input type="zipcode" class="form-control" id="zicope" name="zipcode" value="<?= $renter['zipcode']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="city">Ville</label>
                    <input type="city" class="form-control" id="city" name="city" value="<?= $renter['city']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="phone">Téléphone</label>
                    <input type="phone" class="form-control" id="phone" name="phone" value="<?= $renter['phone']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="website">Site</label>
                    <input type="website" class="form-control" id="website" name="website" value="<?= $renter['website']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="picture">Logo</label>
                    <input type="picture" class="form-control" id="picture" name="picture" value="<?= $renter['picture']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $renter['description']; ?></textarea>
                </div>
            </div>
            <a href="index.php?action=listrenters&id=<?= $renter['id'] ?>" class="btn btn-danger mr-3">annuler</a> <button type="submit" class="btn btn-success">enregistrer</button>
        </form>
    </div>

</div>

<script type="text/javascript" src="public/js/addrenter.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>