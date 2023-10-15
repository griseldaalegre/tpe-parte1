<?php

require_once './database/config.php';

class CategoriasModel
{
    private $db;
    
    public function __construct()
    {
        require_once ('./database/Conection_db.php');
        
        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb(); 
    } 

    function getCategorias()
    {
        
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        // $categorias es un arreglo de categorías
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function deleteCategoria($idCategoria)
    {
       
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$idCategoria]);
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
   private $db;
   
   public function __construct()
    {
        require_once ('./database/Conection_db.php');
        
        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb(); 
    } 

    function getLibrosByCategoria($href)
    {

        $query = $this->db->prepare('SELECT * FROM libros WHERE id_categoria = ?');
        $query->execute([$href]);

        // $categorias es un arreglo de categorias
        $categoria2 = $query->fetchAll(PDO::FETCH_OBJ);

        return $categoria2;
    }

    function deleteLibro($idLibro)
    {
      
        $query = $this->db->prepare('DELETE FROM libros WHERE id_libro = ?');
        $query->execute([$idLibro]);
    }

    function insertLibro($categoria, $titulo, $autor, $anio)
    {
       // Obtener la conexión y asignarla a $this->db
        $query = $this->db->prepare('INSERT INTO libros (id_categoria, titulo_libro, autor_libro, anio) VALUES (?, ?, ?, ?)');
        
        $query->execute([$categoria, $titulo, $autor, $anio]);
        return $this->db->lastInsertId();
    }

    public function modifyLibro($idLibro, $nuevoTitulo, $nuevoAutor, $nuevoAnio)
    {   
        // nombre de mi tabla + el titulo q quiero cambiar + ? = el titulo q recibo + autor + ? = nuevo autor en mi columna id libro?
        $query = $this->db->prepare('UPDATE libros SET titulo_libro = ?, autor_libro = ?, anio = ? WHERE id_libro = ?');
        $query->execute([$idLibro, $nuevoTitulo, $nuevoAutor, $nuevoAnio]);
    }
    
    
}
