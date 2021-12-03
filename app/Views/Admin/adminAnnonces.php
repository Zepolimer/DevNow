<section id="backToDashboard">
  <a href="/devnowMVC/Admin/dashboard">Revenir au Dashboard</a>
</section>

<h2 class="userHasPost"><span class="emojiAd">&#x1F464;</span> <?= $memberList->name_company ?> recherche</h2>

<section class="adminGrid">
  <?php foreach($memberPost as $job): ?>
  <div class="annoncesAdmin">
    <input id="post<?= $job->id_offer ?>" type="radio" name="faq" class="faq"/>
    <label for="post<?= $job->id_offer ?>">
    <?= $job->title ?> <span>à <?= $job->city ?></span>
    </label>

    <article class="displayer">
      <div class="displayerFlex">
        <?= $interval = postedAt($job->date_post); ?>
        <p class="ctgry"><span class="emoji">&#x1F6E0;</span><?= $job->category ?></p>
      </div>

      <h3>Profil</h3>
      <p class="profil"><?= $job->profil ?></p>

      <h3>Missions</h3>
      <p class="mission"><?= $job->missions ?></p>

      <article class="editDelAdmin">
        <a class="editBtn" href="/devnowMVC/Admin/modifierAnnonce/<?= $job->id_offer ?>">Modifier</a>
        <a class="delBtn" href="/devnowMVC/Admin/supprimerAnnonce/<?= $job->id_offer ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'annonce suivante : <?= $job->title ?> à <?= $job->city ?> ?')">Supprimer</a>
      </article>
    </article>
  </div>
  <?php endforeach; ?>
</section>