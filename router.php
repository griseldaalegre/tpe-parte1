<?php
require_once 'apps/controllers/home.controller.php';
require_once 'apps/controllers/categoria.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// Home    ->    showHome();
// Categoria   ->    showCategoria();
// eliminar/:ID  -> removeTask($id); 
// finalizar/:ID  -> finishTask($id);

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'categoria': //cambiar nombre a categorias
        $controller = new CategoriaController();
        $controller->showCategoria();
        break;
    case 'adventure'://cambiar nombre a categoria
        $controller = new AdventureController();
        $controller->showAdventure();    
    default: 
        echo "404 Page Not Found";
        break;
}
