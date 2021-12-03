<?php

namespace devnowMVC\app\Models;
use devnowMVC\app\Core\Db;
use DateTime;

class MainModel extends Db
{
  protected $table;   // Table de la BDD
  private $db;        // Instance de Db
  public $contenu;    // Variable qui contient du contenu ?

  // READ - LIRE
  public function findBy($criteres){
    $champs = [];
    $valeurs = [];

    foreach($criteres as $champ => $valeur){
      $champs[] = "$champ = ?";
      $valeurs[] = $valeur;
    }
    
    $list_champs = implode(' AND ', $champs); // On transforme le tableau "champs" en une chaine de caractères

    return $this->reqPrep('SELECT * FROM ' . $this->table . ' WHERE ' . $list_champs, $valeurs)->fetchAll();
  }

  // CREATE - CRÉER
  public function create(){
    $champs = [];
    $inter = [];
    $valeurs = [];

    foreach($this as $champ => $valeur){
      if($valeur !== null && $champ != 'db' && $champ != 'table'){
        $champs[] = $champ;
        $inter[] = "?";
        $valeurs[] = $valeur;
      }
    }

    $list_champs = implode(', ', $champs);
    $list_inter = implode(', ', $inter);

    return $this->reqPrep('INSERT INTO ' . $this->table . '('. $list_champs.') VALUES('. $list_inter.')', $valeurs);
  }

  // CRÉER / MODIFIER
  public function post(){
    $champs = [];
    $inter = [];
    $valeurs = [];

    foreach($this as $champ => $valeur){
      if($valeur !== null && $champ != 'db' && $champ != 'table'){
        $champs[] = $champ;
        $inter[] = "?";
        $valeurs[] = $valeur;
      }
    }

    $list_champs = implode(', ', $champs);
    $list_inter = implode(', ', $inter);

    return $this->reqPrep('REPLACE INTO ' . $this->table . '('. $list_champs.') VALUES('. $list_inter.')', $valeurs);
  }


  // DELETE
  public function delete($name, int $id){
    return $this->reqPrep("DELETE FROM {$this->table} WHERE $name = $id");
  }


  // REQUÊTE PRÉPARÉE FACTORISÉE
  public function reqPrep(string $sql, array $params = null){
    $this->db = Db::getInstance();
        
    if($params != null){
      $result = $this->db->prepare($sql);
      $result->execute($params);
      return $result;
    } 
    else return $this->db->query($sql);
  }


  // CALCUL ANNONCE POSTÉE LE ...
  function postedAt($datePost) {
    $dateStart = new DateTime($datePost);
    $today = new DateTime(date("Y-m-d"));
    $interval = $dateStart->diff($today);
    
    if($interval->format('%a') == '0'){
      echo $interval->format('<p class="postedToday"><span class="emoji">&#x1F552;</span>aujourd\'hui</p>');
    } else {
      if($interval->format('%a') != '0' AND $interval->format('%a') >= '31'){
        echo $interval->format('<p class="postedSince"><span class="emoji">&#x1F5D3;</span>%m mois</p>');
      } else {
        echo $interval->format('<p class="postedSince"><span class="emoji">&#x1F5D3;</span>%a jours</p>');
      }
    }
  }

}