<?php

namespace devnowMVC\app\Controllers;

require './app/Core/Utils.php';

class AdminController extends Controller
{
// ______________ DASHBOARD & LISTE UTILISATEURS ______________ 
  public function dashboard(){
    if ($this->isAdmin()) {}

    $usersPosts = $this->user->usersPost();
    $usersNoPosts = $this->user->usersNoPost();
    $this->render('Admin/admin', compact('usersPosts', 'usersNoPosts'));
  }


// ______________ LISTE ANNONCES D'UN UTILISATEUR ______________ 
  public function annoncesUtilisateur($id){
    if ($this->isAdmin()) {}

    $memberList = $this->user->findUser($id);
    $memberPost = $this->job->findPost($id);
    $this->render('Admin/adminAnnonces', compact('memberList', 'memberPost'));
  }


// ______________ MODIFIER ANNONCE D'UN UTILISATEUR ______________ 
  public function modifierAnnonce($id){
    if ($this->isAdmin()) {}

    $erreur = "";

    $result = $this->job->find($id);

    if(!$result) header("Location: /devnowMVC/Admin/dashboard");

    if (isset($_POST) && !empty($_POST)) {
      if ($this->validation->validLog($_POST, ['date_post', 'about', 'city', 'title', 'profil', 'missions'])) {
        $erreur = '<p class="erreurPost">Veuillez remplir tous les champs afin d\'enregistrer votre annonce</p>';
      }
      if ($this->validation->validCat()) {
        $erreur = '<p class="erreurPost">Veuillez renseigner le type de mission</p>';
      }
      if(!$this->job->idCompare($_POST['id_company'])){
        $erreur = '<p class="erreurPost">ID utilisateur inconnu</p>';
      }
      if($_POST['id_offer'] != $id){
        $erreur = '<p class="erreurPost">ID de l\'offre non modifiable</p>';
      }

      if (!$erreur) {
        $postChars = $this->validation->validPostAdmin($_POST, ['id_offer', 'id_company', 'date_post', 'about', 'city', 'title', 'category', 'profil', 'missions']);
        if ($postChars) $this->job->postAnnonceAdmin($postChars);
      }
    }

    $this->render('Admin/adminPost', compact('result', 'erreur'));
  }

// ______________ SUPPRIMER ANNONCE D'UN UTILISATEUR ______________ 
  public function supprimerAnnonce($id){
    if ($this->isAdmin()) {}
      
    $this->job->delete('id_offer', $id);
    if ($this->session->getValue('role', 1)) {
      header("location: /devnowMVC/Admin/dashboard");
      exit;
    }
  }

  
// ______________ MODIFIER INFOS D'UN UTILISATEUR ______________ 
  public function modifierUtilisateur($id){
    if ($this->isAdmin()) {}

    $erreur = "";
    
    $result = $this->user->findUser($id);

    if(!$result) {
      header("location: /devnowMVC/Admin/dashboard");
      exit;
    }

    if(!empty($_POST)){
      if($_POST['id_company'] != $result->id_company){
        if($this->user->idTaken($_POST['id_company']))
        $erreur .= '<p class="erreurPost">ID déjà utilisé</p>';
      }

      if($_POST['name'] != $result->name_company){
        if($this->user->userNameTaken($_POST['name']))
        $erreur .= '<p class="erreurPost">Nom d\'utilisateur déjà utilisé</p>';
      }

      if($_POST['mail'] != $result->mail_company){
        if($this->user->emailTaken($_POST['mail']))
        $erreur .= '<p class="erreurPost">Adresse email déjà utilisée</p>';
      }

      if(!$erreur){
        $arr = $this->validation->validUserEditAdmin($_POST, ['id_company', 'name', 'mail']);
        var_dump($arr);
        $this->user->updateUserAdmin($arr, $id);
      }
    }
    $this->render('Admin/adminUser', compact('result', 'erreur'));
  }

// ______________ SUPPRIMER UN UTILISATEUR ______________ 
  public function supprimerUtilisateur($id){
    if ($this->isAdmin()) {}

    $this->user->delete('id_company', $id);
    header('location: /devnowMVC/Admin/dashboard');
    exit;
  }
}