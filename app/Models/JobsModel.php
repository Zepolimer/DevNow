<?php

namespace devnowMVC\app\Models;

use devnowMVC\app\Models\Jobs;

class JobsModel extends Jobs
{
// ______________ ACCUEIL & ANNONCES ______________ 
  // AFFICHER TOUTES LES ANNONCES
  public function findAll(){
    return $this->reqPrep('SELECT company.name_company, jobs.id_offer, jobs.title, jobs.city, jobs.category, jobs.date_post FROM company, jobs WHERE company.id_company = jobs.id_company ORDER BY jobs.date_post DESC')->fetchAll();
  }

  // AFFICHER UNE ANNONCE
  public function find(int $id){
    return $this->reqPrep("SELECT company.name_company, company.mail_company, jobs.id_offer, jobs.title, jobs.city, jobs.category, jobs.about, jobs.profil, jobs.missions, jobs.date_post, jobs.id_company as iduser FROM company, jobs WHERE company.id_company = jobs.id_company AND jobs.id_offer = $id")->fetch();
  }


// ______________  UTILISATEURS  ______________ 
  // AFFICHER TOUS LES POSTS D'UN MEMBRE (aussi utilisé par admin)
  public function findPost($idSess){
    return $this->reqPrep("SELECT * FROM jobs WHERE id_company = $idSess ORDER BY date_post DESC")->fetchAll();
  }


  // AFFICHER UNE ANNONCE
  public function findAndModify(int $id, $company){
    return $this->reqPrep("SELECT company.name_company, company.mail_company, jobs.id_offer, jobs.title, jobs.city, jobs.category, jobs.about, jobs.profil, jobs.missions, jobs.date_post, jobs.id_company as iduser FROM company, jobs WHERE jobs.id_company = $company AND jobs.id_offer = $id")->fetch();
  }

  // MODIFIER UNE ANNONCE 
  public function postAnnonce(array $name){
    $this->setAbout($name[0])
      ->setCity($name[1])
      ->setTitle($name[2])
      ->setCategory($name[3])
      ->setProfil($name[4])
      ->setMissions($name[5])
      ->setId($_SESSION['membre']['id_company'])
      ->setIdOffer($_POST['id_offer'])
      ->post();

    header('location: /devnowMVC/Membres/dashboard');
  }

  // SUPPRIMER UNE ANNONCE
  public function deleteAnnonce($name, int $id, int $company){
    return $this->reqPrep("DELETE FROM {$this->table} WHERE $name = $id AND id_company = $company");
  }


// ______________  ADMIN  ______________ 
  // MODIFIER ANNONCE D'UN UTILISATEUR
  public function postAnnonceAdmin(array $name){
    $this->setIdOffer($name[0])
      ->setId($name[1])
      ->setDate($name[2])
      ->setAbout($name[3])
      ->setCity($name[4])
      ->setTitle($name[5])
      ->setCategory($name[6])
      ->setProfil($name[7])
      ->setMissions($name[8])
      ->post();

    header('location: /devnowMVC/Admin/annoncesUtilisateur/' . $name[1]);
    echo 'modifications enregistrées';
  }

  
// ______________  SECURITÉ  ______________ 
    // COMPARER L'ID UTILISATEUR
    public function idCompare($post){
      return $this->findBy(['id_company' => $post]);
    }

    // COMPARER L'ID DE L'OFFRE
    public function idOfferCompare($post){
      return $this->findBy(['id_offer' => $post]);
    }
}