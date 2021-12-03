<?php

namespace devnowMVC\app\Models;
use devnowMVC\app\Models\MainModel;

class User extends MainModel
{
  protected $id_company;
  protected $name_company;
  protected $mail_company;
  protected $pass_company;
  protected $role;
  
  public function __construct(){
    $this->table = 'company';
  }

  public function getId(){ 
    return $this->id_company; 
  }
  public function setId($id_company){ 
    $this->id_company = $id_company;
    return $this;
  }

  public function getName(){ 
    return $this->name_company; 
  }
  public function setName($name_company){ 
    $this->name_company = $name_company;
    return $this; 
  }

  public function getMail(){ 
    return $this->mail_company; 
  }
  public function setMail($mail_company){ 
    $this->mail_company = $mail_company;
    return $this; 
  }

  public function getPass(){ 
    return $this->pass_company; 
  }
  public function setPass($pass_company){ 
    $this->pass_company = $pass_company;
    return $this;
  }

  public function getRole(){ 
    return $this->role; 
  }
  public function setRole($role){ 
    $this->role = $role;
    return $this;
  }
}