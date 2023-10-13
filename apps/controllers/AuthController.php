<?php

require_once './apps/models/LoginModel.php';
require_once './apps/views/LoginView.php';
require_once './apps/helpers/AuthHelper.php';

class AuthController {
    
    private $model;
    private $view;

    public function __construct() {
        //$this->model = new CategoriaModel()
        AuthHelper::verify();

        $this->model = new LoginModel();
        $this->view = new LoginView();
        
    }
    
    public function showLogin() {
        $this->view->showLogin();
        
    }
    
    public function showSingup() {
        $this->view->showSingup();
    }
    
    public function auth(){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        if (empty($usuario) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }
        
        
        $user = $this->model->getLogin($usuario);
    
        if ($user && password_verify($password, $user->clave_usuario)) {
            
          
            AuthHelper::login($user);
            
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }

    }


