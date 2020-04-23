<?php $title = 'Renters'; ?>

<?php ob_start(); ?>

<div class='row my-4 p-2'>
    <div class="col-8 float-left mb-2">
        <h3>Les Loueurs</h3>
    </div>

    <div class="col-4 mb-2">
        <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-7 col-form-label">Filtrer par département</label>
            <div class="col-sm-5">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>13</option>
                    <option>26</option>
                    <option>29</option>
                    <option>33</option>
                    <option>78</option>
                </select> </div>
        </div>
    </div>

    <?php foreach ($renters as $renter) : ?>
        <div class='col-sm-12 col-md-4'>
            <div class="card mb-5 border-dark">
                <div class=" card-header bg-primary text-white">
                    <h5><?= $renter['name'] ?></h5>
                </div>
                <img src="<?= $renter['picture'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-center">
                        <?= $renter['address'] ?></p>
                    <p class="card-text text-center"><?= $renter['zipcode'] . ' ' . $renter['city'] ?></p>
                    <a href="index.php?action=renter&id=<?= $renter['id'] ?>" class="btn btn-secondary float-right">En savoir +</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>