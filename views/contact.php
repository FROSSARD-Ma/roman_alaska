<?php $title = 'Contact | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

  <h2>Contactez-moi !</h2>

  <section class="container-fluid">
    <p>Vous voulez m'envoyer un message ?</p>
    <p>Remplissez le formulaire ci-dessous et je vous recontacterai dans les meilleurs délais !</p>
  </section>

  <section class="row justify-content-center">

    <form class="needs-validation" novalidate id="contact_form">
      <div class="control-group">
        <div class="form-group">
          <label for="contact_name">Nom</label>
          <input type="text" class="form-control" placeholder="Nom" id="contact_name" required>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group">
          <label for="contact_email">Adresse Email</label>
          <input type="email" class="form-control" placeholder="Adresse Email" id="contact_email" required>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group ">
          <label for="contact_message" >Message</label>
          <textarea rows="5" class="form-control" placeholder="Message" id="contact_message" required></textarea>
        </div>
      </div>

      <div>
        <p id="contact_error">
        </p>
      </div>

      <br>

      <div class="form-group">
        <button type="submit" id="contact_btnForm" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
      </div>
    </form>
  </section>
  
</article>