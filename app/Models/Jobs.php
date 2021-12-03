<?php

namespace devnowMVC\app\Models;
use devnowMVC\app\Models\MainModel;

class Jobs extends MainModel
{
  protected $id_offer;
  protected $id_company;
  protected $title;
  protected $city;
  protected $category;
  protected $about;
  protected $profil;
  protected $missions;
  protected $date_post;

  public function __construct(){
    $this->table = 'jobs';
  }

  public function getIdOffer(){
    return $this->id_offer;
  }
  public function setIdOffer($id_offer){
    $this->id_offer = $id_offer;
    return $this;
  }

  public function getId(){
    return $this->id_company;
  }
  public function setId($id_company){
    $this->id_company = $id_company;
    return $this;
  }

  public function getTitle(){
    return $this->title;
  }
  public function setTitle($title){
    $this->title = $title;
    return $this;
  }

  public function getCity(){
    return $this->city;
  }
  public function setCity($city){
    $this->city = $city;
    return $this;
  }

  public function getCategory(){
    return $this->category;
  }
  public function setCategory($category){
    $this->category = $category;
    return $this;
  }

  public function getAbout(){
    return $this->about;
  }
  public function setAbout($about){
    $this->about = $about;
    return $this;
  }

  public function getProfil(){
    return $this->profil;
  }
  public function setProfil($profil){
    $this->profil = $profil;
    return $this;
  }

  public function getMissions(){
    return $this->missions;
  }
  public function setMissions($missions){
    $this->missions = $missions;
    return $this;
  }

  public function getDate(){
    return $this->date_post;
  }
  public function setDate($date_post){
    $this->date_post = $date_post;
    return $this;
  }
}
