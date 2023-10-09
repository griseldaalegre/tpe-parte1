<?php

class CategoriasView
{
    public function showCategorias($categorias)
    {
        require_once './templates/categorias.phtml';

        return $href;
    }

    public function showEditCategoriaForm($categoria)
{
    require_once './templates/EditarCategoria.phtml';
    
}


    
}

class CategoriaView {
    public function showCategoriaById($categoria) {
        require_once './templates/libros.phtml';
    }
}


?>