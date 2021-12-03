<?php 

namespace devnowMVC\app\Core;

class Session 
{
  private $session;

  public function __construct($session){
    $this->session = $session;
  }

  public function set($name, $value){
    $_SESSION['membre'][$name] = $value;
  }
    
  public function get($name){
    if(isset($_SESSION['membre'][$name])) return $_SESSION['membre'][$name];
  }

  public function getValue($name, $value){
    if($_SESSION['membre'][$name] == $value) return true;
    else return false;
  }

  public function startSession()
  {  
    if($_SESSION['membre']['role'] == 0){
      header('location: /devnowMVC/Membres/dashboard');
    } elseif($_SESSION['membre']['role'] == 1){
      header('location: /devnowMVC/Admin/dashboard');
    }
  }
    
  public function endSession() {
    unset($_SESSION['membre']);
    session_destroy(); 
    header('location: login');
    exit;
  }


}