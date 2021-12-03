<?php

namespace devnowMVC\app\Controllers;

class UsersController extends Controller
{
// ______________ INSCRIPTION ______________ 
  public function register(){
    $erreur = "";

    if(isset($_POST) && !empty($_POST)){
      $userNameTaken = $this->user->userExist($_POST['name'], $_POST['mail']);

      if(!$userNameTaken){
        $uservalid = $this->validation->validReg($_POST, ['name', 'mail', 'pass']);
        if($uservalid) $this->user->createUser($uservalid);
      } else {
        $erreur = '<p class="erreur">Adresse email ou nom d\'entreprise déjà utilisé(e.s).</p>';
      }
    }

    $this->render('Users/register', compact('erreur'));
  }

// ______________ CONNEXION ______________ 
  public function login(){
    $erreur = "";
    
    if(!empty($_POST)){
      if($this->validation->validLog($_POST, ['mail', 'pass'])){
        $erreur = '<p class="erreur">Veuillez remplir correctement les champs.</p>';
      }
    
      $userArray = $this->user->findOneByEmail(strip_tags($_POST['mail']));

      if(!$userArray){
        $erreur = '<p class="erreur">L\'adresse email ou le mot de passe est incorrect.</p>';
      } 
    
      if($userArray && !$erreur){
        if(password_verify($_POST['pass'], $userArray->pass_company)) {
          foreach($userArray as $indice => $element){
            if($indice != 'pass_company') $this->session->set($indice, $element);
          }
          $this->session->startSession();
        } else {
          $erreur = '<p class="erreur">L\'adresse email ou le mot de passe est incorrect.</p>';
        }
      } 
    } 
    $this->render('Users/login', compact('erreur'));
  }


// ______________ DECONNEXION ______________ 
  public function logout(){
    $this->session->endSession();
  }
}