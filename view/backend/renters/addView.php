<?php $title = 'Add renters'; ?>

<?php ob_start(); ?>

<div class='row mt-3'>
    <h3>Ajouter un loueur</h3>

    <div class="col-md-8 offset-md-3 my-3 text-justify">

        <form method="post" action="index.php?action=addrenter" id="crud">
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Nom</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Adresse</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="address">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Code postal</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="zipcode">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Ville</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="city">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Téléphone</label>
                    <input type="tel" class="form-control" id="exampleFormControlInput1" name="phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Site</label>
                    <input type="url" class="form-control" id="exampleFormControlInput1" name="website">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlInput1">Logo</label>
                    <input type="url" class="form-control" id="exampleFormControlInput1" name="picture">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>
            </div>
            <a href="index.php?action=listrenters" class="btn btn-danger mr-3">annuler</a> <button type="submit" class="btn btn-success">enregistrer</button>
        </form>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>