<?php
require_once 'apps/controllers/HomeController.php';
require_once 'apps/controllers/CategoriasController.php';
require_once 'apps/controllers/AuthController.php';
require_once 'apps/controllers/AboutController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Home    ->    showHome();
// Categorias   ->    showCategoria();
// Categoria  -> showCategoria(); 
// 

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {

    case 'home': //Muestra el Home
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'categorias': //Muestra lista de categorias
        $controller = new CategoriasController();
        $controller->showCategorias();
        break;
    case 'categoria': //Muestra lista de libros
        $controller = new CategoriaController();
        $controller->showCategoriaById($params[1]);
        break;
    case 'eliminarLibro':
        $controller = new CategoriaController();
        $controller->removeLibro($params[2]);
         break; 
    case 'agregarLibro':
        $controller = new CategoriaController();
        $controller->addLibro($params[1]);
        break; 
    case 'eliminarCategoria':
        $controller = new CategoriasController();
        $controller->removeCategoria($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new CategoriasController();
        $controller->addCategoria();
        break;
    case 'actualizarCategoria':
        $controller = new CategoriasController();
        $controller-> updateCategoria($params[1]);
    case 'editCategoria':
        $controller = new CategoriasController();
         $controller-> editCategoria($params[1]);
        break;    
    case 'login'://Muestra el login
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'singup'://Muestra la carga de usuarios
        $controller = new AuthController();
        $controller->showSingup();
        break;
    case 'about'://Muestra el about
        $controller = new AboutController();
        $controller->showAbout();
        break;   
    case 'auth'://Autentifica los usuarios
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logOut'://Deslogea a los usuarios
        $controller = new AuthController();
        $controller->logOut();
        break;   
    default: 
        echo "404 Page Not Found";
        break;
}
