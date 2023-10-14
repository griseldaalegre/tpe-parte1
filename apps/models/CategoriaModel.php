<?php

class CategoriasModel
{
    private $db;

    public function __construct()
    {
        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $this->db = $conexionDb->getDb(); // Obtener la conexión y asignarla a $this->db
    } // Hacer una variable parqa q podamos usarla desde cualquier funcion de esta clase $db;

    function getCategorias()
    {
        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $db = $conexionDb->getDb();
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

    function insertCategoria($categoria)
    {
        $query = $this->db->prepare('INSERT INTO categorias (categoria) VALUES(?)');
        $query->execute([$categoria]);
        return $this->db->lastInsertId();
    }

    public function getCategoriaById($id)
    {
    $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
    $query->execute([$id]);

    // Obtener la categoría como un objeto
    $categoria = $query->fetch(PDO::FETCH_OBJ);

    return $categoria;
    }

    public function modifyCategoria($categoria, $id)
    {
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id_categoria = ?');
        $query->execute([$categoria, $id]);
  
    }
    
}


class CategoriaModel
{
    public function __construct()
    {
        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $this->db = $conexionDb->getDb(); // Obtener la conexión y asignarla a $this->db
    } // Hacer una variable parqa q podamos usarla desde cualquier funcion de esta clase $db;

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

    function deleteLibro($id)
    {
        $query = $this->db->prepare('DELETE FROM libros WHERE id_libro = ?');
        $query->execute([$id]);
    }

    function insertLibro($categoria, $titulo, $autor, $anio)
    {
        $query = $this->db->prepare('INSERT INTO libros (id_categoria, titulo_libro, autor_libro, anio) VALUES (?, ?, ?, ?)');
        
        $query->execute([$categoria, $titulo, $autor, $anio]);
        return $this->db->lastInsertId();
    }
    
    
    
    

}
