<?php

class LoginView
{
  public function showLogin($error = null)
  {
    require_once './templates/Login.phtml';
  }

  public function showSingup($error = null)
  {
    require_once './templates/Charge.phtml';
  }
}
