<?php

class CategoriesView
{
    public function showCategories($categories, $error = null )
    {
        $rol = $_SESSION['USER_ROL'];  
        require_once './templates/Categories.phtml';

        return $href;
    }

    public function showEditCategorieForm($categorie, $id)
{   
    require_once './templates/EditCategorie.phtml';
}

    
}

class CategorieView {
    
    public function showBooksByCategorieId($listBooks, $categorieId) {
        $rol = $_SESSION['USER_ROL'];     
        require_once './templates/Books.phtml';
    }

    public function showEditBookForm($idBook, $error = null)
    {   
        require_once './templates/EditBook.phtml';
    }
    
}
