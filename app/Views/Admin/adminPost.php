<section class="adminFormAnnonce">
<form class="formPost" action="" method="post">
  <?= $erreur ?>
  <label for="id_offer">Offre n°</label>
  <input type="number" name="id_offer" id="id_offer" value="<?= $result->id_offer ?>">

  <label for="id_company">Postée par l'utilisateur n°</label>
  <input type="number" name="id_company" id="id_company" value="<?= $result->iduser ?>">

  <label for="date_post">Postée le</label>
  <input type="datetime" name="date_post" id="date_post" value="<?= $result->date_post ?>">

  <label for="about">Présentation de l'entreprise</label>
  <textarea type="text" name="about" id="about" cols="20" rows="20"><?= $result->about ?></textarea>

  <label for="city">Ville</label>
  <input type="text" name="city" id="city" value="<?= $result->city ?>">

  <label for="title">Nom du poste</label>
  <input type="text" name="title" id="title" value="<?= $result->title ?>">

  <label for="category">Stacks</label>
  <select name="category" id="category">
    <option value="Front-end" <?php if(isset($result->category) && ($result->category == 'Front-end')) { echo 'selected'; }; ?>>Front-end</option>
    <option value="Back-end" <?php if(isset($result->category) && ($result->category == 'Back-end')) { echo 'selected'; }; ?>>Back-end</option>
    <option value="Full-stack" <?php if(isset($result->category) && ($result->category == 'Full-stack')) { echo 'selected'; }; ?>>Full-stack</option>
  </select>

  <label for="profil">Profil recherché</label>
  <textarea type="text" name="profil" id="profil" cols="20" rows="20"><?= $result->profil ?></textarea>

  <label for="missions">Missions</label>
  <textarea type="text" name="missions" id="missions" cols="20" rows="20"><?= $result->missions ?></textarea>

  <button type="submit">Envoyer</button>
  <a class="cancelModif" href="/devnowMVC/Admin/annoncesUtilisateur/<?= $result->iduser ?>">Annuler</a>
</form>
</section>