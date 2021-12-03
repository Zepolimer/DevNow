<section class="publierAnnonce">
    
  <article class="mainDescription">
    <h2>Bienvenue <span><?= $_SESSION['membre']['name_company'] ?></span><span> &#x1F44B;</span></h2>
    <p class="paraG1">Vous êtes à la recherche du talent de demain dans le domaine du developpement ? Rien de plus simple, &#8249;DEVNOW&#47;&#8250; vous facilite le recrutement grâce au formulaire ci-dessous !</p>
    <a class="paraG2" href="/devnowMVC/Membres/dashboard">Revenir au dashboard</a>
  </article>

  <section class="annonceMember">
    <form class="formPost" action="" method="post">
      <?= $erreur; ?>
      <input type="hidden" name="id_offer" id="id_offer" value="<?= $result->id_offer ?? 0; ?>">

      <label for="about">1. Commençons par une présentation de votre entreprise :</label>
      <textarea type="text" name="about" id="about" placeholder="Nous sommes ..." cols="20" rows="20"><?= $result->about ?? "" ?></textarea>

      <label for="city">2. Recrutement dans la ville de :</label>
      <input type="text" name="city" id="city" placeholder="Ex : Marseille" value="<?= $result->city ?? ""; ?>">

      <label for="title">3. Intitulé du poste proposé :</label>
      <input type="text" name="title" id="title" placeholder="Ex : Développeur PHP" value="<?= $result->title ?? ""; ?>">

      <label for="category">4. Type de développeur recherché :</label>
      <select name="category" id="category">
        <option value="Front-end" <?php if(isset($result->category) && ($result->category == 'Front-end')) { echo 'selected'; }; ?>>Front-end</option>
        <option value="Back-end" <?php if(isset($result->category) && ($result->category == 'Back-end')) { echo 'selected'; }; ?>>Back-end</option>
        <option value="Full-stack" <?php if(isset($result->category) && ($result->category == 'Full-stack')) { echo 'selected'; }; ?>>Full-stack</option>
      </select>

      <label for="profil">5. Profil de candidat recherché :</label>
      <textarea type="text" name="profil" id="profil" placeholder="Ex : De formation en développement web avec une expérience de ..." cols="20" rows="20"><?= $result->profil ?? "" ?></textarea>

      <label for="missions">6. Missions confiées au candidat :</label>
      <textarea type="text" name="missions" id="missions" placeholder="Ex : Intégration CMS, développement web app, méthode agile ..." cols="20" rows="20"><?= $result->missions ?? "" ?></textarea>

      <button type="submit">Envoyer</button>
    
    <?php if(isset($result)):
      echo '<a class="cancelModif" href="/devnowMVC/Membres/dashboard">Annuler</a>';
    endif; ?>
    </form>
  </section>

</section>