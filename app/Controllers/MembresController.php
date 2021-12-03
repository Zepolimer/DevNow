<?php

namespace devnowMVC\app\Controllers;

require './app/Core/Utils.php';

class MembresController extends Controller
{
// ______________ DASHBOARD & LISTE ANNONCES ______________ 
  public function dashboard()
  {
    if ($this->isConnected()) {}

    $memberPost = $this->job->findPost($this->session->get('id_company'));
    $this->render('Membres/index', compact('memberPost'));
  }


// ______________ DASHBOARD & CREATION / MODIFICATION ANNONCE ______________ 
  public function annonce($id = null){
    if ($this->isConnected()) {}

    $erreur = "";

    // MODIFIER (si l'id existe)
    if ($id != null) {
      $result = $this->job->findAndModify($id, $this->session->get('id_company'));

      if (!$result) {
        header('location: /devnowMVC/Membres/dashboard');
      } else {
        if (!empty($_POST)) {
          if ($this->validation->validCat()) {
            $erreur = '<p class="erreurPost">Veuillez renseigner le type de mission</p>';
          }
          if ($this->validation->validLog($_POST, ['about', 'city', 'title', 'profil', 'missions'])) {
            $erreur = '<p class="erreurPost">Veuillez remplir tous les champs afin d\'enregistrer votre annonce</p>';
          }
          if (!$erreur) {
            $postChars = $this->validation->validPost($_POST, ['about', 'city', 'title', 'category', 'profil', 'missions']);
            if ($postChars) $this->job->postAnnonce($postChars);
          }
        }
      }

      $this->render('Membres/post', compact('result', 'erreur'));
    }

    // CRÉER
    if (!empty($_POST)) {
      if ($this->validation->validCat()) {
        $erreur = '<p class="erreurPost">Veuillez renseigner le type de mission</p>';
      }
      if ($this->validation->validLog($_POST, ['about', 'city', 'title', 'profil', 'missions'])) {
        $erreur = '<p class="erreurPost">Veuillez remplir tous les champs afin d\'enregistrer votre annonce</p>';
      }
      if (!$erreur) {
        $postChars = $this->validation->validPost($_POST, ['about', 'city', 'title', 'category', 'profil', 'missions']);
        if ($postChars) $this->job->postAnnonce($postChars);
      }
    }
    $this->render('Membres/post', compact('erreur'));
  }


// ______________ SUPPRIMER UNE ANNONCE ______________ 
  public function supprimer($id){
    if ($this->isConnected()) {}

    if ($this->session->getValue('role', 0)) {
      $this->job->deleteAnnonce('id_offer', $id, $this->session->get('id_company'));
      header('location: /devnowMVC/Membres/dashboard');
      exit;
    }
  }


// ______________ MODIFIER SES INFOS (NOM, EMAIL) ______________ 
  public function settings($id){
    if ($this->isConnected()) {}

    $erreur = "";

    if ($this->session->get('id_company') === $id) {
      $result = $this->user->editUser($id);

      if (isset($_POST) && !empty($_POST)) {
        if ($this->validation->validLog($_POST, ['name', 'mail', 'pass'])) {
          $erreur = '<p class="erreurSettings">Veuillez remplir correctement les champs.</p>';
        }

        $validPass = password_verify($_POST['pass'], $result->pass_company);
        if (!$validPass) {
          $erreur = '<p class="erreurSettings">Mot de passe incorrect.</p>';
        }

        $userNameTaken = $this->user->userNameTaken($_POST['name']);
        if($userNameTaken && $_POST['name'] != $this->session->get('name_company')) {
          $erreur = '<p class="erreurSettings">Nom d\'entreprise déjà utilisé.</p>';
        }

        $mailTaken = $this->user->emailTaken($_POST['mail']);
        if($mailTaken && $_POST['mail'] != $this->session->get('mail_company')){
          $erreur = '<p class="erreurSettings">Adresse email déjà utilisée.</p>';
        }

        if ($validPass & !$erreur) {
          $userValid = $this->validation->validReg($_POST, ['name', 'mail', 'pass']);

          $this->user->updateUserInfos($userValid, $id);
          $this->session->set('name_company', $userValid[0]);
        }
      }
    } else header('location: /devnowMVC/Membres/dashboard');

    $this->render('Membres/settings', compact('result', 'erreur'));
  }
}