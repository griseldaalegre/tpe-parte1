<?php

require_once './apps/models/LoginModel.php';
require_once './apps/views/LoginView.php';
require_once './apps/helpers/AuthHelper.php';

class AuthController {
    
    private $view;
    private $model;

    public function __construct() {
        
        $this->model = new LoginModel();
        $this->view = new LoginView();  
    }
    
    public function showLogin() {
        $this->view->showLogin();
        // creo la claver para ver el hash y guardarlo en la base de datos!
        
        //echo password_hash("admin", PASSWORD_DEFAULT);
        
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

            
            
             if (isset($_SESSION['USER_ID'])) {
                // Usuario autenticado
                $rolUsuario = $_SESSION['USER_ROL'];     
                
                if ($rolUsuario == 1) {
                    header('Location: ' . BASE_URL);
                } else if ($rolUsuario == 0) {
                    header('Location: ' . BASE_URL);
                }
            }
                         
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }
    public function logOut() {
        AuthHelper::logOut();
        header('Location: ' . BASE_URL);    
    }
    
    public function showSingup() {
        echo "entro a registro";
        $this->view->showSingup();
    }

    public function upUser() {

        $usuario = $_POST['nombre'];  
        $password = $_POST['password'];

        if (empty($usuario) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        } else {
       // Genero el hash de la contraseña
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $this->model->insertUser($usuario, $passwordHash);
        header('Location: ' . BASE_URL . 'login');
        echo "Registro Exitoso";
        }
    }
}


