<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title ?></title>

        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta Name="description" content="Billet simple pour l'Alaska - Roman de Jean Forteroche">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- FONTAWESOME -->
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        <!-- Custom FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        
  
        <link href="favicon.png"  rel="apple-touch-icon"  />
        <link href="favicon.png"  rel="icon"      type="image/png"  />
        <link href="favicon.ico"  rel="shortcut icon" type="image/x-icon"  />
        <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->

        <!-- Feuille de style CSS -->
        <link href="public/css/clean-blog.css" rel="stylesheet" />
        <link href="public/css/style.css" rel="stylesheet" />

    </head>
        
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
              <a class="navbar-brand" href="index.php?action=about">Jean Forteroche</a>
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?action=home">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?action=contact">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-secondary" href="index.php?action=inscription">Inscription</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-secondary" href="index.php?action=login">connexion</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-secondary" href="index.php?action=logout">déconnexion</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>

        <!-- Page Header -->
        <header class="masthead">
            <div class="overlay"></div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="site-heading">
                    <h1>Billet simple pour l'Alaska</h1>
                    <span class="subheading">Jean Forteroche</span>
                  </div>
                </div>
              </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container">
            <div class="row">
                <?= $content ?>
            </div>
        </main>

        <hr>
        <!-- Footer -->
        <footer>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                  <ul class="list-inline text-center">
                    <li class="list-inline-item">
                      <a href="#">
                        <span class="fa-stack fa-lg">
                          <i class="fas fa-circle fa-stack-2x"></i>
                          <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <span class="fa-stack fa-lg">
                          <i class="fas fa-circle fa-stack-2x"></i>
                          <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                  </ul>
                  <p class="copyright text-muted">Copyright © 2019 Jean Forteroche | Roman - Billet pour l'Alaska</p>
                </div>
              </div>
            </div>
        </footer>

      <!-- Javascript de Bootstrap -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

      <!-- Popper -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    </body>
    
</html>