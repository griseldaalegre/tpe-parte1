<?php

class CategoriasView
{
    public function showCategorias($categorias, $rolUsuario)
    {
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
        require_once './templates/libros.phtml';
    }
}
