<?php

require_once './database/config.php';

class LoginModel
{

    function getLogin($usuario){


        require_once './database/Conection_db.php';

        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $db = $conexionDb->getDb(); 

        $query = $db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$usuario]);

        // $usuarios es un arreglo de categorias
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

}

