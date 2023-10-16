<?php

require_once './database/config.php';

class LoginModel
{
    private $db;

    public function __construct()
    {      
        require_once './database/Conection_db.php';
        $conexionDb = new ConectionDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->db = $conexionDb->getDb(); 
    }

    public function getLogin($user)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $query->execute([$user]);

        $userDb = $query->fetch(PDO::FETCH_OBJ);

        return $userDb;
    }

    public function insertUser($user, $passwordHash)
    {
        $query = $this->db->prepare('INSERT INTO usuarios (nombre_usuario, clave_usuario) VALUES (?, ?)');
   
        $query->execute([$user, $passwordHash]);
        return $this->db->lastInsertId();
    }
}
