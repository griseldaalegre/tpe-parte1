<?php

class CategoriasView
{
    public function showCategorias($categorias)
    {
        $rol = $_SESSION['USER_ROL'];  
        require_once './templates/categorias.phtml';

        return $href;
    }

    public function showEditCategoriaForm($categoria, $id)
{   
    require_once './templates/EditarCategoria.phtml';
}


    
}

class CategoriaView {//idlibros
    
    public function showLibrosByCategoriaId($listaLibros, $categoriaId) {
        $rol = $_SESSION['USER_ROL'];     
        require_once './templates/libros.phtml';
    }

    public function showEditLibroForm($hrefIdLibro )
    {   
        require_once './templates/EditarLibro.phtml';
    }
    
}
