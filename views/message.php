<!-- Message ERREUR -->
<?php if (isset($_SESSION['errorMessage'])) :?>
  <div id="errorMessage" class="message erreur">
    <strong><?=$_SESSION['errorMessage'];?></strong>
  </div>
  <?php unset($_SESSION['errorMessage']); ?>
<?php endif ?>


<!-- Message SUCCESS -->
<?php if (isset($_SESSION['successMessage'])) : ?>
  <div id="successMessage" class="message success">
    <strong><?=$_SESSION['successMessage'];?></strong>
  </div>
  <?php unset($_SESSION['successMessage']); ?>
<?php endif ?>