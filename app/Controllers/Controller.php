<?php

namespace devnowMVC\app\Controllers;

use devnowMVC\app\Core\Session;
use devnowMVC\app\Core\Validation;
use devnowMVC\app\Models\{JobsModel, UserModel};

abstract class Controller 
{
  protected $job;
  protected $user;
  protected $session;
  protected $validation;

  public function __construct(){
    $this->job = new JobsModel;
    $this->user = new UserModel;
    $this->session = new Session($_SESSION);
    $this->validation = new Validation;
  }


// ______________ REDIRECTION SI NON UTILISATEUR ______________ 
  public function isConnected(){
    if(!$this->session->get('id_company')) {
      header('location: /devnowMVC/annonces');
      exit;
    }
  }


// ______________ REDIRECTION SI NON ADMIN ______________ 
  public function isAdmin(){
    if($this->session->getValue('role', 0)){
      header('location: /devnowMVC/Membres/dashboard');
      exit;
    } 
    elseif($this->isConnected());
  }


  public function validate($form, array $fields){
    foreach($fields as $field){
      if(!empty($form[$field])){
        if(strlen($form[$field]) < 3) return false;
        else return htmlspecialchars($form[$field]);
      }
    }
    return true;
  }


// ______________ RENDER : CHARGE LA PAGE SUR TEMPLATE DE PAGE ______________ 
  public function render(string $file, array $data = []){
    extract($data);
    ob_start();
    require_once ROOT . '/devnowMVC/app/Views/' . $file .'.php';
    $contenuPage = ob_get_clean();
    require_once ROOT . '/devnowMVC/app/Views/template.php';
  }
}

/** Fonction render()
 *  On extrait le contenu de $data 
 * On démarre le buffer de sortie : toute sortie HTML sera conservée à partir de là : ob_start()
 * On récupère la vue correspondant au $file 
 * On retourne tout le HTML
 * On récupère le template de page qui contiendra toutes les vues
  */
