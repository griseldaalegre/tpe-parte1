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

    public function __construct()
    {
      
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    public function showCategoriaById($categoriaId)
    {
        $categoria = $this->model->getCategoria($categoriaId);
        // muestro la tabla 
        $this->view->showCategoriaById($categoria, $categoriaId);
    }

    public function removeLibro($id)
    {
        $this->model->deleteLibro($id);
        header('Location: ' . BASE_URL . 'categoria');
    }

    public function addLibro($categoriaId) {
        $titulo = $_GET['titulo'];
        $autor = $_GET['autor'];
        $anio = $_GET['anio'];
        $idCategoria = $categoriaId;
        var_dump($idCategoria);
    
        if (empty($idCategoria) || empty($titulo) || empty($autor) || empty($anio)) {
            echo "error, hay un campo vacio"; // Pregunta si alguno de los campos está vacío.
        } else {
            $this->model->insertLibro($idCategoria, $titulo, $autor, $anio);
            header('Location: ' . BASE_URL . 'categoria/' . $idCategoria);

        }
    }
    
    
}
