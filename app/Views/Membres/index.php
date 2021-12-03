<section class="publierAnnonce">
  <article class="mainDescription">
    <h2>Bienvenue <span><?= $_SESSION['membre']['name_company'] ?></span><span> &#x1F44B;</span></h2>

    <p class="paraG1">Vous êtes à la recherche du talent de demain dans le domaine du developpement ? &#8249;DEVNOW&#47;&#8250; vous aide dans vos recherches !</p>

    <a class="paraG2" href="annonce">Poster une annonce</a>
    <a class="paraG2" href="settings/<?= $_SESSION['membre']['id_company'] ?>">Modifier mon profil</a>
  </article>

  <section class="annonceMember">
    <h3 id="annoncesTitle">Votre recherche de candidats</h3>

    <?php if($memberPost) {
      foreach ($memberPost as $annonces) : ?>
        <section class="memberContent">
          <div class="annonceContainer">
            <?= $interval = postedAt($annonces->date_post); ?>
            <h3><?= $annonces->title ?></h3>

            <article class="memberIA">
              <p class="city"><span class="emoji">&#x1F4Cd;</span><?= $annonces->city ?></p>
              <p class="category"><span class="emoji">&#x1F6E0;</span><?= $annonces->category ?></p>
            </article>
          </div>
          <div class="actionAnn">
            <a class="modif" href="annonce/<?= $annonces->id_offer ?>"><img class="modifAnn" src="/devnowMVC/public/images/modifier.png"></a>
            <a class="suppr" href="supprimer/<?= $annonces->id_offer ?>"><img class="modifAnn" src="/devnowMVC/public/images/supprimer.png"></a>
            <!-- <a class="suppr" href=""><img class="modifAnn" src="/devnowMVC/public/images/supprimer.png"></a> -->
          </div>
        </section>

        <!-- <section class="modal">
        <h3>Voulez vous supprimer cette annonce ?</h3>
        <a href="supprimer/<?= $annonces->id_offer ?>">Supprimer</a>
        <a href="profil">Annuler</a>
        </section> -->
    <?php endforeach; 
    } elseif(!$memberPost) { ?>
      <section class="notYetAnn">
        <p>Vous n'avez pas encore postée d'annonce ? Vous pouvez en créer une facilement via ce <a class="formAnchor" href="annonce">formulaire</a>. &#x1F4DD;</p>
      </section>
    <?php } ?>
  </section>
</section>