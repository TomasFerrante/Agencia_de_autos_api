<?php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_agencia_autos;charset=utf8', 'root', '');
    }

    public function getUsuarioByUsuario($usuario) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE Usuario = ?');
        $query->execute([$usuario]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}