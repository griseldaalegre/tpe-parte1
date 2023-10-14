<?php
class LoginModel {

    function getLogin($usuario){

        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $db = $conexionDb->getDb(); // Obtener la conexión

        $query = $db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$usuario]);

        // $usuarios es un arreglo de categorias
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    
}