<?php

namespace devnowMVC\app\Controllers;
require './app/Core/Utils.php';

class AnnoncesController extends Controller 
{
// ______________ LISTE DE TOUTES LES ANNONCES ______________ 
  public function annonces(){
    $jobList = $this->job->findAll();
    $this->render('Annonces/index', compact('jobList'));
  }

  
// ______________ DÉTAILS D'UNE ANNONCE ______________ 
  public function annonce($id){
    $annonce = $this->job->find($id);
    $this->render('annonces/annonce', compact('annonce'));
  }
}