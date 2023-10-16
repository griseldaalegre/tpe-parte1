<?php


require_once './apps/models/LoginModel.php';
require_once './apps/views/LoginView.php';
require_once './apps/helpers/AuthHelper.php';
require_once './apps/controllers/ErrorController.php';

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
 
        $user = $_POST['user'];
        $password = $_POST['password'];
        
        if (empty($user) || empty($password)) {
            $controller = new ErrorController();
            $controller->showErrorNonData("Datos Vacios");
            return;
        }
            
        $userDb = $this->model->getLogin($user);
        
        if ($userDb && password_verify($password, $userDb->clave_usuario)) {
            
            
            AuthHelper::login($userDb);

            
            
             if (isset($_SESSION['USER_ID'])) {
                // Usuario autenticado
                $rolUser = $_SESSION['USER_ROL'];     
                
                header('Location: ' . BASE_URL);
                
                return $rolUser;
            }
                         
        } else {
            $controller = new ErrorController();
            $controller->showErrorInvalidUser("Usuario invalido");
        }
    }
    public function logOut() {
        AuthHelper::logOut();
        header('Location: ' . BASE_URL);    
    }
    
    public function showSingup() {
        $this->view->showSingup();
    }

    public function upUser() {

        $user = $_POST['nombre'];  
        $password = $_POST['password'];

        if (empty($user) || empty($password)) {
            $controller = new ErrorController();
            $controller->showErrorNonData("Datos vacios");

            return;
        } else {
       // Genero el hash de la contraseña
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $this->model->insertUser($user, $passwordHash);
        header('Location: ' . BASE_URL . 'login');
        }
    }
}


