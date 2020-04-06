<?php
    try{
        $bdd = new PDO ('mysql:host=localhost;dbname=combis', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
        $query = $bdd->prepare('
            SELECT * FROM renter
            JOIN address ON renter.address_id = address.id
            WHERE renter.id = 1
        ');
        $query->execute();
        $renter = $query->fetch();
        // echo'<pre>';
        // print_r($renter);
        // echo'</pre>';

        $query = $bdd->prepare('
            SELECT * FROM model
            JOIN version ON model.version_id = version.id
            LIMIT 2
        ');
        $query->execute();
        $models = $query->fetchAll(PDO::FETCH_ASSOC);
        // echo'<pre>';
        // print_r($models);
        // echo'</pre>';
        $bdd = null;
    } catch (PDOException $e) {
        echo 'Erreur: '.$e->getMessage().'<br/';
        die();
    }
 
?>

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
                <div class="p-5"><h1>COMBIS & ROAD</h1></div>
            </div>
        </header>

        <section class="row p-2">
            <div class="col-12">
                <h3>Loueur du mois</h3>
            </div>
            <div class="col-xs-12 col-md-6">
                <img src="<?php echo $renter['picture'] ?>" class="rounded mx-auto d-block" alt="photo loueur français">
            </div>
            <div class="col-xs-12 col-md-6 p-3">
                <div><?= ucfirst($renter['name']) ?></div>
                <div><?php echo $renter['address'] ?></div>
                <div><?php echo $renter['zipcode'].' '.ucfirst($renter['city']) ?></div>
                <div><?php echo $renter['phone'] ?></div>
                <div><?php echo $renter['website'] ?></div>
                <div><?php echo $renter['description'] ?></div>
            </div>
        </section>

        <section class="row p-2">
            <div class="col-xs-12 col-md-12">
                <h3>Zoom sur les combis...</h3>
            </div>

            <?php foreach ($models AS $model): ?>
            <div class="col-xs-12 col-md-6">
                <div class="card p-2">
                    <img src="<?php echo $model['picture'] ?>" class="card-img-top-thumbnail" alt="...">
                    <div class="card-body text-center">
                    <p class="card-text"><?php echo $model['model'].' '.$model['nickname'].' '.$model['name'];?> </br> <?php echo $model['year_start'].' à '.$model['year_end'];?></p>
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