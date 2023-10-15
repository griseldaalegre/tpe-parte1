<?php

require_once './apps/views/HomeView.php';
require_once './apps/helpers/AuthHelper.php';

class HomeController
{
    //private $model;
    private $view;

    public function __construct() {

        AuthHelper::verify();
        $this->view = new HomeView();
     /*   var_dump($_SESSION['USER_ROL']);     
        var_dump($_SESSION['USER_NOMBRE']);
        var_dump($_SESSION['USER_ID']);
        */      
    }

    public function showHome()
    {

        $this->view->showHome();
    }
}
