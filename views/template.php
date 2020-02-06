<!DOCTYPE html>
<html lang="fr">
  <head>
    <title><?=$title;?></title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta Name="description" content="Billet simple pour l'Alaska - Roman de Jean Forteroche">

    <!-- FONTAWESOME -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Custom FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <link href="favicon.png" rel="apple-touch-icon"/>
    <link href="favicon.png" rel="icon" type="image/png"/>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->

    <!-- Feuille de style CSS -->
    <link href="public/css/style.css" rel="stylesheet"/>

    <!-- Editeur TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/u4xff8r9ciwt2ajzu2k01zqtcwzgfjbfwiq9klhgl7cohse4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="public/js/tinyMCE/tinymce.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <?php include 'nav.php';?>

    <!-- Header -->
    <header id="header">
      <div class="overlay"></div>
      <article class="heading">
        <h1>Billet simple pour l'Alaska</h1>
        <span class="subheading">Jean Forteroche</span>
      </article>
    </header>

    <!-- Main Content -->
    <main>
        <?=$content;?>
    </main>

    <!-- Footer -->
    <footer>
      <hr>
      <section class="container">
        <p class="center">
          <span class="fa-stack fa-lg">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
          </span>
         <span class="fa-stack fa-lg">
          <i class="fas fa-circle fa-stack-2x"></i>
          <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
        </span>
        </p>
        <p class="center">Copyright © 2019 Jean Forteroche | Roman - Billet pour l'Alaska</p>
      </section>
    </footer>

    <script src="public/js/main.js"></script>

  </body>

</html>