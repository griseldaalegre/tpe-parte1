<?php
require_once './apps/models/CategoriaModel.php';
require_once './apps/views/CategoriaView.php';

class CategoriasController
{
    //privates
    private $model;
    private $view;

    public function __construct()
    {
        //$this->model = new CategoriaModel()
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();
    }
    public function showCategorias()
    {
        $categorias = $this->model->getCategorias();
        $href = $this->view->showCategorias($categorias);
    }
    public function removeCategoria($id)
    {
        $this->model->deleteCategoria($id);
        header('Location: ' . BASE_URL);
    }
    public function addCategoria()
    {
        $categoria = $_POST['categoria'];
        if(empty($categoria)){
            echo "error"; // $this->view->showError("Debe completar todos los campos"); return;
        }
        $nuevaCategoria = $this->model->insertCategoria($categoria);
        if($nuevaCategoria){
            header('Location: ' . BASE_URL);
        } else {
            echo "error"; // $this->view->showError("Error al insertar la tarea");
        }

    }
}
class CategoriaController
{
    //privates
    private $model;
    private $view;

    public function __construct()
    {
        //$categoria = getCategoriaById($id);
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
        // $this->view = new CategoriaView();
    }

    public function showCategoriaById($categoria)
    {
        $categoria = $this->model->getCategoria($categoria);
        // muestro la tabla 
        $this->view->showCategoriaById($categoria);
    }
}
