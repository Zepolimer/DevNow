<?php
namespace devnowMVC\app\Controllers;

class NotfoundController extends Controller
{
  public function notFound(){
    $this->render('notFound');
  }
}