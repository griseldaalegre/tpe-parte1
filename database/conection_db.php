<?php
class ConectionDb {
    
    private $db;

    function __construct() {
        $this->conect();
    }

    function conect() {
        $this->db = new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', 'root', '');
    }

    function getDb() {
        return $this->db;
    }
}
?>
