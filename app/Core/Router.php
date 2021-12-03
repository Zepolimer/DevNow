<?php

namespace devnowMVC\app\Core;
use devnowMVC\app\Controllers\AnnoncesController;
use devnowMVC\app\Controllers\NotfoundController;

class Router
{
  public function start(){
    session_start();

    $uri = $_SERVER['REQUEST_URI'];

    if(!empty($uri) && $uri !== '/' && $uri[-1] === '/'){
      $uri = substr($uri, 0, -1); // Enlever le slash
      http_response_code(301);    // Code de redirection permanente
      header('Location: '.$uri);  // Rediriger vers URL sans /
    }

    // Séparer les paramètres (explode) dans un array
    $params = [];
    if(isset($_GET['p'])) $params = explode('/', $_GET['p']); 

    if($params[0] !== ''){
      // On récupère une action qui correspond à la méthode
      if(isset($params[1])) $action = $params[1];
      else $action = 'annonces';
            
      $controller = 'devnowMVC\\app\\Controllers\\'.ucfirst($params[0]).'Controller';

      $controller = new $controller();

      if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params);
      } else {
        http_response_code(404);
        $controller = new NotfoundController;
        $controller->notFound();
      }
    } else {
      // Pas de params -> on instancie le controller par défaut
      $controller = new AnnoncesController;
      $controller->annonces();
    }
  }
}

// Fonctionnement des URL : http://devnowMVC/controleur/methode/parametres
// Rendu des URL : http://devnowMVC/annonces/details/brouette 
// Méthode de réécriture d'URL : http://devnowMVC/index.php?p=annonces/details/brouette