<?php

require_once './database/config.php';

class CategoriesModel
{
    private $db;

    public function __construct()
    {
        require_once('./database/Conection_db.php');

        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb();
    }

    function getCategories()
    {

        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        // $categorias es un arreglo de categorías
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    function deleteCategoria($idCategorie, $error = null)
    {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$idCategorie]);
    }

    function insertCategorie($categorie)
    {
        $query = $this->db->prepare('INSERT INTO categorias (categoria) VALUES(?)');
        $query->execute([$categorie]);
        return $this->db->lastInsertId();
    }

    public function getCategorieById($id)
    {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);

        // Obtener la categoría como un objeto
        $categorie = $query->fetch(PDO::FETCH_OBJ);

        return $categorie;
    }

    public function modifyCategorie($categorie, $id)
    {
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id_categoria = ?');
        $query->execute([$categorie, $id]);
    }
}


class CategorieModel
{
    private $db;

    public function __construct()
    {
        require_once('./database/Conection_db.php');

        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb();
    }

    function getBooksByCategorie($href)
    {

        $query = $this->db->prepare('SELECT * FROM libros WHERE id_categoria = ?');
        $query->execute([$href]);

        // $categorias es un arreglo de categorias
        $categorie2 = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorie2;
    }

    function deleteBook($idBook)
    {

        $query = $this->db->prepare('DELETE FROM libros WHERE id_libro = ?');
        $query->execute([$idBook]);
    }

    function insertBook($id_Categorie, $titulo_libro, $autor_libro, $anio)
    {
        // Obtener la conexión y asignarla a $this->db
        $query = $this->db->prepare('INSERT INTO libros (id_categoria, titulo_libro, autor_libro, anio) VALUES (?, ?, ?, ?)');

        $query->execute([$id_Categorie, $titulo_libro, $autor_libro, $anio]);
        return $this->db->lastInsertId();
    }

    public function modifyBook($idBook, $newTitle, $newAuthor, $newYear)
    {

        $query = $this->db->prepare('UPDATE libros SET titulo_libro = ?, autor_libro = ?, anio = ? WHERE id_libro = ?');
        $query->execute([$newTitle, $newAuthor, $newYear, $idBook]);
    }
}
