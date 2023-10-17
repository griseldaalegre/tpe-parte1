<?php
require_once './database/config.php';

class ConectionDb
{
    private $db;

    function __construct()
    {
        $this->conect();
    }

    function conect()
    {   //creo coneccion con config.php
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    }

    function getDb()
    {
        return $this->db;
    }
}
