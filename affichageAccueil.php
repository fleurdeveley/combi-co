<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Accueil</title>
</head>

<body>
    <div class="container">
        <header class="row p-2">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(247, 247, 183);">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>                
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Modèles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Loueurs</a>
                            </li>
                        </ul>                
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <img src="https://via.placeholder.com/200x200" class="img-fluid" alt="logo site">
            </div>
            <div class="col-xs-12 col-md-8 text-center">
                <div class="m-3 p-5"><h1>COMBIS & ROAD</h1></div>
            </div>
        </header>

        <section class="row p-2">
            <div class="col-12">
                <h3>Loueur du mois</h3>
            </div>
            <div class="col-xs-12 col-md-6">
                <img src="<?= $renter['picture'] ?>" class="rounded mx-auto d-block" alt="photo loueur français">
            </div>
            <div class="col-xs-12 col-md-6 p-1">
                <div><?= ucfirst($renter['name']) ?></div>
                <div><?= $renter['address'] ?></div>
                <div><?= $renter['zipcode'].' '.ucfirst($renter['city']) ?></div>
                <div><?= $renter['phone'] ?></div>
                <div><?= $renter['website'] ?></div>
                <div><?= $renter['description'] ?></div>
            </div>
        </section>

        <section class="row p-2">
            <div class="col-xs-12 col-md-12">
                <h3>Zoom sur les combis...</h3>
            </div>

            <?php foreach ($models AS $model): ?>
            <div class="col-xs-12 col-md-6">
                <div class="card border-dark m-1 p-1">
                    <img src="<?= $model['picture'] ?>" class="card-img-top-thumbnail" alt="...">
                    <div class="card-body text-center">
                    <div><?= $model['model'].' '.$model['nickname'];?></div>
                    <div><?= $model['name'];?></div>
                    <div><?= $model['year_start'].' à '.$model['year_end'];?></div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </section>

        <footer class="row p-2">
            <div class="col-xs-12 col-lg-4 text-center">
                <div class="mb-1">Inscription newsletter</div>                  
                <form class="form-inline">
                    <input class="form-control" type="search" placeholder="Email" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="far fa-envelope fa-lg"></i></button>
                </form>
            </div>
            <div class="col-xs-12 col-lg-4 text-center">
                <span>Suivez-nous</span><i class="fab fa-facebook-square fa-2x m-2"></i> <i class="fab fa-instagram-square fa-2x m-2"></i> <i class="fab fa-twitter-square fa-2x m-2"></i>
            </div>
            <div class="col-xs-12 col-lg-4 text-center p-3">
                <ul class="list-inline">
                    <li class="list-inline-item">Accueil</li>|
                    <li class="list-inline-item">Modèles</li>|
                    <li class="list-inline-item">Loueurs</li>
                </ul>
            </div>
            <div class="col-12 text-center">
                copyright
            </div>
        </footer>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>