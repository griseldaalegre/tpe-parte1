<?php

require_once './apps/views/home.view.php';

class HomeController {
    //private $model;
    private $view;

    public function __construct() {
        
        $this->view = new HomeView();
        
    }

    public function showHome() {
      
        // muestro las tareas desde la vista
        $this->view->showHome();
    }
}
