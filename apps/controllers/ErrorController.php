<?php
class ErrorController
{

  public function showErrorInvalidUser($error)
  {

    require_once './templates/Login.phtml';
  }

  public function showErrorNonData($error)
  {

    require_once './templates/Login.phtml';
  }
  public function showErrorNonDataCat($error, $model)
  {
    $categories = $model->getCategories();
    $view = new CategoriesView();
    $view->showCategories($categories, $error);
  }
  public function showErrorInsert($error)
  {

    require_once './templates/Login.phtml';
  }
  public function showErrorDeleteCat($error, $model)
  {
    $categories = $model->deleteCategoria();
    $view = new CategoriesView();
    $view->showCategories($categories, $error);
  }
  public function showErrorNonUser($error)
  {

    $view = new HomeView();
    $view->showHome($error);
  }
}
