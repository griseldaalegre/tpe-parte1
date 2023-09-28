<?php
require_once './apps/views/categoria.view.php';


class CategoriaController {
    //private $model;
    private $view;

    public function __construct() {
        //$this->model = new TaskModel();
        $this->view = new CategoriaView();
        
    }
    public function showCategoria() {
        // muestro la tabla 
        $this->view->showCategoria();
    }
}