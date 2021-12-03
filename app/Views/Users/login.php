<section class="pageContainer">
  <article class="imgContainer">
    <img src="/devnowMVC/public/images/logBg.png" alt="teams">
  </article>

  <article class="formContainer">
    <?= $erreur; ?>
    <form method="post" action="login" class="formSection">
      <label for="mail"></label>
      <input type="text" name="mail" id="mail" placeholder="Adresse mail">

      <label for="pass"></label>
      <input type="password" name="pass" id="pass" placeholder="Mot de passe">

      <input type="submit" value="Se connecter" class="btnSubmit">
    </form>

    <p class="toggleForm">Oups ! Vous n'avez encore pas de compte ? <a href="register">Inscrivez-vous !</a></p>
  </article>
</section>