<?php

namespace devnowMVC\app\Core;

class Validation
{
  // STRLEN $_POST
  public function validLog($post, array $fields)
  {
    foreach($fields as $field){
      if(strlen($post[$field]) < 3) return true;
    }
  }

  // REGISTER CHARS, FILTER & HASH
  public function validReg($post, array $values)
  {
    foreach($values as $value){
      if($value === 'name' || $value === 'mail' || $value === 'pass'){
        $name = htmlspecialchars($post['name']);
        $mail = filter_var($post['mail'], FILTER_VALIDATE_EMAIL);
        $pass = password_hash($post['pass'], PASSWORD_DEFAULT);
      }
      return array($name, $mail, $pass);
    }
  }

  // CATEGORY
  public function validCat()
  {
    if(!isset($_POST["category"]) || $_POST['category']!= 'Front-end' && $_POST['category']!= 'Back-end' && $_POST['category']!= 'Full-stack' ) return true;
  }

  // SPECIALCHARS $_POST
  public function validPost($post, array $fields)
  {
    foreach($fields as $field){
      if(!empty($post[$field])){
        $about = htmlspecialchars($post['about']);
        $city = htmlspecialchars($post['city']);
        $title = htmlspecialchars($post['title']);
        $category = htmlspecialchars($post['category']);
        $profil = htmlspecialchars($post['profil']);
        $mission = htmlspecialchars($post['missions']);
      }
      return array($about, $city, $title, $category, $profil, $mission);
    }
  }

  public function validPostAdmin($post, array $fields)
  {
    foreach($fields as $field){
      if(!empty($post[$field])){
        $id_offer = htmlspecialchars($post['id_offer']);
        $id_company = htmlspecialchars($post['id_company']);
        $date_post = htmlspecialchars($post['date_post']);
        $about = htmlspecialchars($post['about']);
        $city = htmlspecialchars($post['city']);
        $title = htmlspecialchars($post['title']);
        $category = htmlspecialchars($post['category']);
        $profil = htmlspecialchars($post['profil']);
        $mission = htmlspecialchars($post['missions']);
      }
      return array($id_offer, $id_company, $date_post, $about, $city, $title, $category, $profil, $mission);
    }
  }

  public function validUserEditAdmin($post, array $fields){
    foreach($fields as $field){
      if(!empty($post[$field])){
        $id = ($post['id_company']);
        $name = htmlspecialchars($post['name']);
        $mail = filter_var($post['mail'], FILTER_VALIDATE_EMAIL);
      }
    }
    return array((int)$id, $name, $mail);
  }
}