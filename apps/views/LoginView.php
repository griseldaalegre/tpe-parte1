<?php

class LoginView {
   
  public function showLogin($error = null) {
    require_once './templates/login.phtml';
    
  }

  public function showSingup(){
    require_once './templates/alta.phtml';
  }

  public function showError($error) {
    require 'templates/error.phtml';
  }
}