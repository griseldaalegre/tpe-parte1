<?php

class LoginView
{

  public function showLogin($error = null)
  {
    require_once './templates/Login.phtml';
  }

  public function showSingup()
  {
    require_once './templates/Charge.phtml';
  }
}
