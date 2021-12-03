<section id="backToDashboard">
  <a href="/devnowMVC/Admin/dashboard">Revenir au Dashboard</a>
</section>

<section class="usersContainerProfil">
  <?= $erreur ?>
  <form action="" method="POST" class="modifUserForm">
    <label for="id_company">ID utilisateur</label>
    <input type="number" name="id_company" id="id_company" value="<?= $result->id_company ?>">

    <label for="name">Nom de l'entreprise</label>
    <input type="text" name="name" id="name" value="<?= $result->name_company ?>">

    <label for="mail">Email de l'entreprise</label>
    <input type="mail" name="mail" id="mail" value="<?= $result->mail_company ?>">

    <button type="submit" id="btnSubmit">Enregistrer</button>
  </form>
</section>