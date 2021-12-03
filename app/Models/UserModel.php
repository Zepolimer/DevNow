<?php

namespace devnowMVC\app\Models;
use devnowMVC\app\Models\User;

class UserModel extends User
{
// ______________ AUTHENTIFICATION ______________ 
  // CONNEXION - Permet de retrouver l'adresse mail d'un utilisateur
  public function findOneByEmail($mail){
    return $this->reqPrep("SELECT * FROM company WHERE mail_company = ?", [$mail])->fetch();
  }

  // INSCRIPTION - Permet de voir si l'user existe (nom et/ou email)
  public function userExist($name, $mail){
    if($this->findBy(['name_company' => $name]) || $this->findBy(['mail_company' => $mail])){
      return true;
    } 
  }

  // INSCRIPTION - Fonction pour créer l'utilisateur dans la BDD
  public function createUser(array $name){
    $this->setName($name[0])
    ->setMail($name[1])
    ->setPass($name[2])
    ->create();

    header('location: /devnowMVC/Users/login');
    exit;
  }


// ______________ UTILISATEUR ______________ 
  // EDITER LE PROFIL - retrouver l'utilisateur
  public function editUser(int $id){
    return $this->reqPrep("SELECT * FROM company WHERE id_company = $id")->fetch();
  }

  // EDITER LE PROFIL - modifier les infos de l'utilisateur
  public function updateUserInfos(array $name, $id){
    $this->reqPrep("UPDATE company SET name_company = ?, mail_company = ? WHERE id_company = $id", [$name[0], $name[1]]);

    header('location: /devnowMVC/Membres/dashboard');
  }


// ______________ ADMIN ______________ 
  // AFFICHER LES USERS QUI ONT POSTÉ
  public function usersPost(){
    return $this->reqPrep("SELECT DISTINCT company.id_company, name_company, mail_company FROM company INNER JOIN jobs ON company.id_company = jobs.id_company ORDER BY name_company");
  }

  // AFFICHER LES USERS QUI N'ONT PAS POSTÉ
  public function usersNoPost(){
    return $this->reqPrep("SELECT DISTINCT company.id_company, name_company, mail_company FROM company LEFT JOIN jobs ON company.id_company = jobs.id_company WHERE jobs.id_company IS NULL AND role LIKE 0 ORDER BY name_company");
  }

  // TROUVER UN UTILISATEUR POUR MODIFIER SES INFOS
  public function findUser($id){
      return $this->reqPrep("SELECT name_company, id_company, mail_company FROM company WHERE id_company = $id")->fetch();
  }

  // EDITER LE PROFIL DE L'UTILISATEUR
  public function updateUserAdmin(array $name, $id){
    $this->reqPrep("UPDATE company SET id_company = ?, name_company = ?, mail_company = ? WHERE id_company = $id", [$name[0], $name[1], $name[2]]);
  
    header('location: /devnowMVC/Admin/dashboard');
  }


// ______________ SECURITÉ ______________ 
  // ID UTILISATEUR UTILISÉ ?
  public function idTaken($id){
    if($this->findBy(['id_company' => $id])) return true;
  }

  // NOM ENTREPRISE UTILISÉ ?
  public function userNameTaken($name){
    if($this->findBy(['name_company' => $name])) return true;
  }

  // ADRESSE MAIL UTILISÉ ?
  public function emailTaken($mail){
    if($this->findBy(['mail_company' => $mail])) return true;
  }
}