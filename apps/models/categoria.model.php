<?php
class CategoriaModel {

    function getCategoria() {
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

class AdventureModel {
    function getAdventure(){
        require_once './database/conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $db = $conexionDb->getDb(); // Obtener la conexión

        $query = $db->prepare('SELECT * FROM libros WHERE id_categoria = 1');
        $query->execute();

        // $categorias es un arreglo de categorias
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }
}
    

?>
