<?php

require_once './apps/models/LoginModel.php';
require_once './apps/views/LoginView.php';

class LoginController {
    
    private $model;
    private $view;

    public function __construct() {
        //$this->model = new CategoriaModel()
        $this->model = new LoginModel();
        $this->view = new LoginView();
        
    }
    
    public function showLogin() {
        $usuarios = $this->model->getlogin();
        $this->view->showLogin();

    }
}