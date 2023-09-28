<?php

require_once './apps/views/task.view.php';

class TaskController {
    //private $model;
    private $view;

    public function __construct() {
        //$this->model = new TaskModel();
        $this->view = new TaskView();
        
    }

    public function showHome() {
        // obtengo tareas del controlador
       // $tasks = $this->model->getTasks();
        
        // muestro las tareas desde la vista
        $this->view->showHome();
    }
}
