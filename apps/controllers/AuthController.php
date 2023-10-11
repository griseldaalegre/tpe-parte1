<?php

require_once './apps/models/LoginModel.php';
require_once './apps/views/LoginView.php';
require_once './apps/helpers/auth.helper.php';

class AuthController {
    
    private $view;
    private $model;

    public function __construct() {
        
        $this->model = new LoginModel();
        $this->view = new LoginView();  
    }
    
    public function showLogin() {
        $this->view->showLogin();
    }

    
    public function auth(){
        
        $usuarios = $_POST['usuario'];
        $password = $_POST['password'];
        
        if (empty($usuarios) || empty($password)) {
            //$this->view->showLogin('Faltan completar datos');
            echo 'falta completar campos';
            return;
        }
        
        //else {
            
            $user = $this->model->getByUser();
            echo $password;
            if ($user && password_verify($password, $user->clave_usuario)) {
                
                echo 'adentro';
                AuthHelper::login($user);
                
                header('Location: ' . BASE_URL);
                } 
            else {
                $this->view->showErrorLogin();
            }        
                //}                    
                
                
            }
            
            public function showSingup() {
                $this->view->showSingup();
            }
        }
        