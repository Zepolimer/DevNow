<section class="headBtnSent">
  <a class="sendBtn" href="mailto:<?php echo $annonce->mail_company ?>">Candidater</a>
  <a class="backAnnonces" href="/devnowMVC/annonces"><img src="/devnowMVC/public/images/backAnnonces.png" alt="retour"></a>
</section>


<section class="dateAnnonce">
  <?= $interval = postedAt($annonce->date_post)?>
</section>

<section class="companyContainer">
  <h3 class="nameCompany"><span class="emojiTitle">&#x1F464;</span><?= $annonce->name_company; ?></h3>
  <p class="descAbout"><?= $annonce->about ?></p>
</section>

<section class="descriptionContainer">
  <h3><?= $annonce->title ?></h3>

  <article class="infosContainer">
    <p class="cat"><span class="emoji">&#x1F6E0;</span><?= $annonce->category ?></p>
    <p class="where"><span class="emoji">&#x1F4Cd;</span><?= $annonce->city ?></p>
  </article>

  <h4>Profil recherché</h4>
  <p class="descAbout"><?= $annonce->profil ?></p>

  <h4>Missions</h4>
  <p class="descAbout"><?= $annonce->missions ?></p>
</section>

