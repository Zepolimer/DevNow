<h1 class="adminUsersTitle"><span id="userNumber1"></span> utilisateurs ont des annonces actives</h1>
<section class="usersContainerPost">
  <?php foreach($usersPosts as $list): ?>
    <article class="allUsers">
      <h3 class="nameFilter"><span class="emoji">&#x1F464;</span><?= $list->name_company ?></h3>
      <p class="mailFilter"><span class="emoji">&#x27A1;</span><?= $list->mail_company ?></p>
      <a href="annoncesUtilisateur/<?= $list->id_company ?>"><span class="emoji">&#x1F449;</span><span class="underlineAnchor">Voir les annonces</span></a>
    </article>
  <?php endforeach; ?>
</section>

<h1 class="adminUsersTitle adminOrange"><span id="userNumber2"></span> utilisateurs n'ont aucune annonce active</h1>
<section class="usersContainerNoPost">
  <?php foreach($usersNoPosts as $list): ?>
    <article class="allUsers">
      <h1 class="nameFilter"><span class="emoji">&#x1F464;</span><?= $list->name_company ?></h1>
      <p class="mailFilter"><span class="emoji">&#x27A1;</span><?= $list->mail_company ?></p>

      <div class="editSupprAdmin">
        <a class="userModifier" href="/devnowMVC/Admin/modifierUtilisateur/<?= $list->id_company ?>">Modifier</a>
      
        <a class="userCiao" href="/devnowMVC/Admin/supprimerUtilisateur/<?= $list->id_company ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'utilisateur : <?= $list->name_company ?> ?')">
          <img src="../public/images/remove.png" alt="supprimer"></a>
      </div>
    </article>
  <?php endforeach; ?>
</section>
