<?php $title = "Contacter l'auteur" ?>

<?php ob_start(); ?>

<article class="container-fluid ">

  <h2>Contactez-moi !</h2>

  <section class="container-fluid">
    <p>Vous voulez m'envoyer un message ?</p>
    <p>Remplissez le formulaire ci-dessous et je vous recontacterai dans les meilleurs délais !</p>
  </section>

  <section class="row justify-content-center">

    <form name="sentMessage" id="form-contact" novalidate>
      <div class="control-group">
        <div class="form-group">
          <label for="user_name">Nom</label>
          <input type="text" class="form-control" placeholder="Nom" id="user_name" required>
      
        </div>
      </div>
      <div class="control-group">
        <div class="form-group">
          <label for="user_email">Adresse Email</label>
          <input type="email" class="form-control" placeholder="Adresse Email" id="user_email" required>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group ">
          <label for="message" >Message</label>
          <textarea rows="5" class="form-control" placeholder="Message" id="message" required></textarea>
  
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

