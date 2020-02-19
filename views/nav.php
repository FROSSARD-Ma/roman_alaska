<nav id="nav" class="topnav">

  <a class="auteur" href="index.php?page=about"><i class="fas fa-feather-alt"></i> Jean Forteroche</a>

  <?php if ($_SESSION['role'] == 'admin') { ?>
    <a class="active" href="index.php?page=admin">Admin</a>
  <?php } ?>

  <a href="index.php?page=home">Accueil</a>
  <a href="index.php?page=chapters">Chapitres</a>
  <a href="index.php?page=contact">Contact</a>
   
  <?php if(isset($_SESSION['user'])) { ?>
    <a class="active" href="index.php?page=logout">déconnexion</a>
  <?php } else { ?>
    <a class="active" href="index.php?page=inscription">Inscription</a>
    <a class="active" href="index.php?page=login">connexion</a>
  <?php } ?>

  <a href="javascript:void(0);" class="hamburger" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

</nav>