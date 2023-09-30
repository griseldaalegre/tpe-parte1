<?php
require_once 'apps/controllers/home.controller.php';
require_once 'apps/controllers/categoria.controller.php';
require_once 'apps/controllers/LoginController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
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

    case 'categoria'://Muestra lista de libros
        $controller = new CategoriaController();
        $controller->showCategoriaById($params[1]);
        break;

    case 'login':
        $controller = new LoginController();
        $controller->showLogin();
        break; 
    default: 
        echo "404 Page Not Found";
        break;
}
