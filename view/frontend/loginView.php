<?php $title = 'Admin'; ?>

<?php ob_start(); ?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card border-dark my-3">
            <div class="card-header bg-primary text-white text-center ">
                Connexion à l'administrateur
            </div>
            <div class="card-body">
                <form method="post" action="index.php?action=login" id="login">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-secondary text-white"><i class="fas fa-at"></i></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-secondary text-white"><i class="fas fa-unlock-alt"></i></div>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de Passe">
                    </div>
                    <div class=text-center>
                        <button type="submit" class="btn btn-secondary">me connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>