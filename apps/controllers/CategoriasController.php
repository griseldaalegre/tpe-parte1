<?php
require_once './apps/models/CategoriaModel.php';
require_once './apps/views/CategoriaView.php';
require_once './apps/helpers/AuthHelper.php';

class CategoriasController {
    //privates
    
    private $model;
    private $view;

    public function __construct() {
    
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();
        
    }
    public function showCategorias() {
        $categorias = $this->model->getCategorias();
        $href = $this->view->showCategorias($categorias);

    }
}
class CategoriaController {
    //privates
    private $model;
    private $view;
    
    public function __construct() {
        //$categoria = getCategoriaById($id);
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
       // $this->view = new CategoriaView();
    }

    public function showCategoriaById($categoria) {
        $categoria = $this->model->getCategoria($categoria);
        // muestro la tabla 
        $this->view->showCategoriaById($categoria);
        
    }
}