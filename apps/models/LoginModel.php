<?php
class LoginModel
{

    function getLogin()
    {

        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(); // Crear una instancia de ConectionDb
        $db = $conexionDb->getDb(); // Obtener la conexión

        $query = $db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$nombre_usuario]);

        // $usuarios es un arreglo de categorias
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);

        return $usuarios;
    }
}
