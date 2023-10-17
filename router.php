<?php
require_once 'apps/controllers/HomeController.php';
require_once 'apps/controllers/CategoriesController.php';
require_once 'apps/controllers/AuthController.php';
require_once 'apps/controllers/AboutController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {

    case 'home': //Muestra el Home
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'categorias': //Muestra lista de categorias
        $controller = new CategoriesController();
        $controller->showCategories();
        break;
    case 'libroByCategoria': //Muestra lista de libros
        $controller = new CategorieController();
        $controller->showBooksByCategorieId($params[1]);
        break;
    case 'eliminarLibro':
        $controller = new CategorieController();
        $controller->removeBook($params[1], $params[2]);
        break;
    case 'agregarLibro':
        $controller = new CategorieController();
        $controller->addBook($params[1]);
        break;
    case 'actualizarLibro':
        $controller = new CategorieController();
        $controller->updateBook($params[1]);
        break;
    case 'editarLibro':
        $controller = new CategorieController();
        $controller->editBook($params[1]);
        break;
    case 'eliminarCategoria':
        $controller = new CategoriesController();
        $controller->removeCategorie($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new CategoriesController();
        $controller->addCategorie();
        break;
    case 'actualizarCategoria':
        $controller = new CategoriesController();
        $controller->updateCategorie($params[1]);
        break;
    case 'editCategoria':
        $controller = new CategoriesController();
        $controller->editCategorie($params[1]);
        break;
    case 'login': //Muestra el login
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'singup': //Muestra la carga de usuarios
        $controller = new AuthController();
        $controller->showSingup();
        break;
    case 'registro': //Muestra la carga de usuarios
        $controller = new AuthController();
        $controller->upUser();
        break;
    case 'about': //Muestra el about
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'auth': //Autentifica los usuarios
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logOut': //Deslogea a los usuarios
        $controller = new AuthController();
        $controller->logOut();
        break;
    case 'error':
        $controller = new ErrorController();
        $controller->showErrorInvalidUser($error);
        break;
    case 'error':
        $controller = new ErrorController();
        $controller->showErrorNonData($error);
        break;
    case 'error':
        $controller = new ErrorController();
        $controller->showErrorNonDataCat($error, $model);
        break;
    case 'error':
        $controller = new ErrorController();
        $controller->showErrorInsert($error);
        break;
    default:
        echo "404 Page Not Found";
        break;
}
