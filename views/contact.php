<?php $title = 'Contact | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

  <h2>Contactez-moi !</h2>

  <section class="container-fluid">
    <p>Vous voulez m'envoyer un message ?</p>
    <p>Remplissez le formulaire ci-dessous et je vous recontacterai dans les meilleurs délais !</p>
  </section>

  <?php include('message.php');?>

  <section class="row justify-content-center">
    
    <form action="index.php?page=creatContact" method="post" id="contact_form">

      <div class="form-group">
        <label for="contact_name">Nom<span class="required">*</span></label>
        <input type="text" id="contact_name" name="name" placeholder="Entrez votre nom" minlength="2" maxlength="50" required>
      </div>
   
      <div class="form-group">
        <label for="contact_email">Email<span class="required">*</span></label>
        <input type="email" id="contact_email" name="email" placeholder="Entrez votre adresse Email" size="50" maxlength="50" required>
      </div>
   
      <div class="form-group">
        <label for="contact_message" >Message<span class="required">*</span></label>
        <textarea rows="5" id="contact_msg" name="message" placeholder="Laissez-moi un message" minlength="2" required></textarea>
      </div>

      <p class="errorMessage erreur"></p>
      
      <button type="submit" id="contact_btnForm">Envoyer</button>

      <p><span class="required">*</span> Champs obligatoires</p>
     
    </form>
  </section>
  
</article>