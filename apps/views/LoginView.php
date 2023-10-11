<?php
class LoginView {
   
  public function showLogin() {
    require_once './templates/login.phtml';
  }

  public function showSingup(){
    require_once './templates/alta.phtml';
  }
 public  function showErrorLogin(){
 
 }
}