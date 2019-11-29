<?php $title = "Contacter l'auteur" ?>

<?php ob_start(); ?>

<article class="container-fluid ">

  <h2>Contactez-moi !</h2>

  <section class="container-fluid">
    <p>Vous voulez m'envoyer un message ?</p>
    <p>Remplissez le formulaire ci-dessous et je vous recontacterai dans les meilleurs délais !</p>
  </section>

  <section class="container-fluid">

    <form name="sentMessage" id="contactForm" novalidate>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Nom</label>
          <input type="text" class="form-control" placeholder="Name" id="name" required>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Adresse Email</label>
          <input type="email" class="form-control" placeholder="Adresse Email" id="email" required>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Message</label>
          <textarea rows="5" class="form-control" placeholder="Message" id="message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <br>
      <div id="success"></div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
      </div>
    </form>
  </section>
  
</article>


<?php $content = ob_get_clean(); ?>

<?php include('view/frontend/template.php'); ?>

