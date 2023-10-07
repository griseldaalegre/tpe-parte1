<?php
class LoginView
{

  public function showLogin()
  {

    require_once './templates/Header.php';

?>
    <div class="login">
      <form>

        <div>
          <label>Email address</label>
          <input type="email" placeholder="email@example.com">
        </div>

        <div>
          <label>Password</label>
          <input type="password" placeholder="Password">
        </div>

        <div>
          <div class="uno">
            <input type="checkbox">
            <label> Remember me </label>
          </div>

      </form>

      <div class="dos">
        <button type="submit">Sign in</button>
        <a href="#">Sign up</a>
        <a href="#">Forgot password?</a>
      </div>

    </div>


<?php

    require_once './templates/Footer.php';
  }
}
?>