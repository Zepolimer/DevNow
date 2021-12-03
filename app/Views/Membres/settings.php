<section class="publierAnnonce">
  <article class="mainDescription">
    <h2>Bienvenue <span><?= $_SESSION['membre']['name_company'] ?></span><span> &#x1F44B;</span></h2>

    <p class="paraG1">Vous pouvez modifier dans le formulaire ci-contre le nom de votre entreprise et / ou votre adresse email. Il vous suffit de rentrer votre mot de passe et de valider pour enregistrer vos nouvelles informations.</p>

    <a class="paraG2" href="dashboard">Revenir au dashboard</a>
  </article>
  <article class="formContainerSettings" autocomplete="off">
    <p class="erreurSettings"><?= $erreur; ?></p>

    <form action="" method="post" class="formSettings">
        <label for="name">Redéfinir le nom de votre entreprise</label>
        <input type="text" name="name" id="name" placeholder="Nom de l'entreprise" value="<?= $result->name_company; ?>">

        <label for="mail">Redéfinir l'adresse email</label>
        <input type="text" name="mail" id="mail" placeholder="Adresse mail" value="<?= $result->mail_company; ?>">

      <label id="mdpLabel" for="pass">Mot de passe (obligatoire)</label>
      <input id="mdpInput" type="password" name="pass" id="pass" placeholder="Saissisez votre mot de passe">

      <input type="submit" value="Enregistrer" id="btnSubmit">
    </form>
  </article>
</section>