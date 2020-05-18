<?php $title = 'Renter'; ?>
<?php $metadescription = 'Dans les parages, il y a certainement un loueur de combi, renseignez-vous'; ?>

<?php ob_start(); ?>

<div class='row my-4 p-2'>
    <div class='col-sm-12 col-md-8 offset-md-2'>
        <div class="card box-shadows-6px-gray">
            <div class="card-header bg-perso">
                <h3><?= $renter['name'] ?></h3>
            </div>
            <img src="<?= $renter['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-center"><?= $renter['address'] ?></p>
                <p class="card-text text-center"><?= $renter['zipcode'] . ' ' . $renter['city'] ?></p>
                <p class="card-text text-center"><?= $renter['phone'] ?></p> </br>
                <p class="card-text text-center"> <a href="<?= $renter['website'] ?>" target="_blank"><?= $renter['website'] ?> </a></p></br>
                <p class="card-text text-justify"><?= $renter['description'] ?></p>
                <h5>Modèles disponibles :</h5>
                <ul>
                    <?php foreach ($renterModels as $renterModel) : ?>
                        <li class="card-text text-justify"><?= $renterModel['model'] . ' ' . $renterModel['nickname'] . ' ' . $renterModel['name'] ?></li>
                    <?php endforeach ?>
                </ul>
                <table class="table table-hover text-center">
                    <h5>Météo à <?= $renter['city'] ?></h5>
                    <thead>
                        <th class="table-active">Dans les 7 jours</th>
                        <th class="table-active">Température</th>
                        <th class="table-active">Probalitité de pluie</th>
                        <th class="table-active">Probabilité de vent</th>
                    </thead>
                    <tbody>
                        <?php foreach ($forecasts as $forecast) : ?>
                            <tr>
                                <td><?= (new \DateTime($forecast->datetime))->format('j/m/Y'); ?></td>
                                <td><?= $forecast->tmin.'°C / '. $forecast->tmax.'°C' ?></td>
                                <td><?= $forecast->probarain.'%' ?></td>
                                <td><?= $forecast->probawind70.'%' ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>