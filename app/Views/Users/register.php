<section class="pageContainer">
  <article class="imgContainer">
    <img src="/devnowMVC/public/images/logBg.png" alt="teams">
  </article>
    
  <article class="formContainer" autocomplete="off">
    <?= $erreur; ?>
        
    <form action="" method="post" class="formSection">
      <label for="name"></label>
      <input type="text" name="name" id="name" placeholder="Nom de l'entreprise" autocomplete="off">

      <label for="mail"></label>
      <input type="text" name="mail" id="mail" placeholder="Adresse mail" autocomplete="off">

      <label for="pass"></label>
      <input type="password" name="pass" id="pass" placeholder="Mot de passe" autocomplete="off">

      <input type="submit" value="S'inscrire" class="btnSubmit">
    </form>

    <p class="toggleForm">Déjà inscrit ? <a href="login">Connectez-vous !</a></p>
  </article>
</section>