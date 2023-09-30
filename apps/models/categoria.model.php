<?php
class CategoriasModel {

    function getCategorias() {
        require_once './database/conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $db = $conexionDb->getDb(); // Obtener la conexión

        $query = $db->prepare('SELECT * FROM categorias');
        $query->execute();

        // $categorias es un arreglo de categorias
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }
}

class CategoriaModel {
    function getCategoria($href){
        require_once './database/conection_db.php';

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
    

?>
