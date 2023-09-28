<?php
require_once './apps/models/categoria.model.php';
require_once './apps/views/categoria.view.php';

class CategoriaController {
    //privates
    private $model;
    private $view;

    public function __construct() {
        //$this->model = new CategoriaModel();
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
        
    }
    public function showCategoria() {
        $categorias = $this->model->getCategoria();
        // muestro la tabla 
        $this->view->showCategoria($categorias);
        
    }
}
class AdventureController {
    //privates
    private $model;
    private $view;
    
    public function showAdventure() {
        $this->model = new AdventureModel();
       // $this->view = new AdventureView();
    }
}