<?php
require_once './apps/models/CategoriaModel.php';
require_once './apps/views/CategoriaView.php';
require_once './apps/helpers/AuthHelper.php';
require_once './database/config.php';

class CategoriasController
{
    //privates
    
    private $model;
    private $view;
    private $helper;
    
    public function __construct() {
        
        AuthHelper::verify();
        $this->helper = new AuthHelper;
        $this->model = new CategoriasModel();
        $this->view = new CategoriasView();
    }
    
    public function showCategorias()
    {
        $categorias = $this->model->getCategorias();
        $rolUsuario = $this->helper->login($user);
        $href = $this->view->showCategorias($categorias, $rolUsuario);
    }

    public function removeCategoria($id)
    {
        $this->model->deleteCategoria($id);
        header('Location: ' . BASE_URL . 'categorias');
    }
    
    public function addCategoria()
    {
        $categoria = $_GET['categoria'];
        if(empty($categoria)){
            echo "error"; // Muestra un mensaje de error cuando la categoría está vacía
        } else {
            $nuevaCategoria = $this->model->insertCategoria($categoria);
            if($nuevaCategoria){
                header('Location: ' . BASE_URL . 'categorias');
            } else {
                echo "error"; // Muestra un mensaje de error si ocurre un error al insertar la categoría
            }
        }
    }


    public function editCategoria($id)
    {

        $categoria = $this->model->getCategoriaById($id);
        $this->view->showEditCategoriaForm($categoria, $id);

    }
    

    public function updateCategoria($id)
    {  
        $categoria = $_GET['newCategoria'];
        
        if (empty($categoria)) {
            echo "error";
        } else {
            $this->model->modifyCategoria($categoria, $id);
          
        }

        header('Location: ' . BASE_URL . 'categorias');

    }
    

}
    

class CategoriaController
{
    //privates
    private $model;
    private $view;

    public function __construct() {
        
        AuthHelper::verify();

        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
       
    }

    public function showLibrosByCategoriaId($categoriaId)
    {
        $ListadoLibros = $this->model->getLibrosByCategoria($categoriaId);
        // muestro la tabla 
        $this->view->showLibrosByCategoriaId($ListadoLibros, $categoriaId);
       
    } //repasar

    public function removeLibro($idCategoria, $idLibro)
    {
        $this->model->deleteLibro($idLibro);
        header('Location: ' . BASE_URL . 'libroByCategoria/' . $idCategoria);
    }

    public function addLibro($categoriaId) {
        $titulo = $_GET['titulo'];
        $autor = $_GET['autor'];
        $anio = $_GET['anio'];
        $idCategoria = $categoriaId;
    
    
        if (empty($idCategoria) || empty($titulo) || empty($autor) || empty($anio)) {
            echo "error, hay un campo vacio"; // Pregunta si alguno de los campos está vacío.
        } else {
            $this->model->insertLibro($idCategoria, $titulo, $autor, $anio);
            header('Location: ' . BASE_URL . 'libroByCategoria/' . $idCategoria);

        }
    }
    
}
