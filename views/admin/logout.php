<?php $title = 'Se désinscrire | Billet pour l\'Alalska'; ?>

<?php 
//-------  DECONNEXION de l'ESPACE MEMBRE  ------------------
setcookie('pass');
setcookie('email');

session_destroy();
?>

<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">

  <!-- Then put toasts within -->
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded mr-2" alt="...">
      <strong class="mr-auto">Déconnexion</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Bonjour, vous êtes maintenant déconnecté de votre compte sur "Billet pour l'Alaska" !
    </div>
  </div>
</div>