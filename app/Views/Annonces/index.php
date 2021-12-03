<section id="searchContainer">
  <article id="searchByCity">
    <label for="citySearch"></label>
    <input type="text" name="citySearch" id="citySearch" placeholder="filtrer par ville">
    <button id="deleteCity">X</button>
  </article>
</section>

<section class="containerDisplay">
  <?php foreach ($jobList as $list) : ?>
    <section class="annoncesContainer <?= $list->city ?>">
      <article class="headAnn">
        <?= $interval = postedAt($list->date_post); ?>
        <p class="category"><span class="emoji">&#x1F6E0;</span><?= $list->category ?></p>
      </article>

      <h3 class="titleJob"><a href="annonces/annonce/<?= $list->id_offer ?>"><?= $list->title ?></a></h3>

      <p class="nomComp"><span class="emoji">&#x1F464;</span><?= $list->name_company ?></p>

      <p class="city"><span class="emoji">&#x1F4Cd;</span><?= $list->city ?></p>
    </section>
  <?php endforeach; ?>
</section>