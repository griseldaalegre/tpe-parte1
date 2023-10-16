<?php
class ErrorController {

  public function showErrorInvalidUser($error) {
    
    require_once './templates/Login.phtml';
  }

  public function showErrorNonData($error) {
    
    require_once './templates/Login.phtml';
  }
  public function showErrorNonDataCat($error, $model) {
    $categories = $model->getCategories(); // Utiliza el modelo pasado como argumento
    $view = new CategoriesView();
    $view->showCategories($categories, $error);
  }
  public function showErrorInsert($error) {
    
    require_once './templates/Login.phtml';
  }


}