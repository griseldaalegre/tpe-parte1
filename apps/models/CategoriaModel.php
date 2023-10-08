<?php

class CategoriasModel
{
    private $db;

    public function __construct()
    {
        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $this->db = $conexionDb->getDb(); // Obtener la conexión y asignarla a $this->db
    }

    function getCategorias()
    {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        // $categorias es un arreglo de categorías
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function deleteCategoria($id)
    {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }

    function insertCategoria($categoria){
        $query = $this->db->prepare('INSERT INTO categorias (categoria) VALUES(?)');
        $query->execute([$categoria]);
        return $this->db->lastInsertId();
    }

    public function updateCategoria($id, $categoria)
    {
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id_categoria = ?');
        $query->execute([$categoria, $id]);
    }
    
    function modifyCategoria($id){
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id = ?');
        $query->execute([$categoria, $id]);
    
        $this->model->updateCategoria($id);
    }
    
    
}


class CategoriaModel
{
    function getCategoria($href)
    {
        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $db = $conexionDb->getDb(); // Obtener la conexión

        //$id = $categoria->id_categoria;

        $query = $db->prepare('SELECT * FROM libros WHERE id_categoria = ?');
        $query->execute([$href]);

        // $categorias es un arreglo de categorias
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);

        return $categoria;
    }
}
