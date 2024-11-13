<?php
  class ReseniaModel {
    private $db;

    public function __construct() {
      $this->db = new PDO('mysql:host=localhost;dbname=db_agencia_autos;charset=utf8', 'root', '');
    }

    public function getAll($filtrarValoracion = null, $orderBy = false) {
      $sql = "SELECT * FROM reseñas";

      if ($filtrarValoracion != null) {
        switch($filtrarValoracion) {
          case 1:
            $sql .= " WHERE Valoracion = 1";
          break;
          case 2;
            $sql .= " WHERE Valoracion = 2";
          break;
          case 3;
            $sql .= " WHERE Valoracion = 3";
          break;
          case 4;
            $sql .= " WHERE Valoracion = 4";
          break;
          case 5;
            $sql .= " WHERE Valoracion = 5";
          break;
        }
      }

      if ($orderBy) {
        switch($orderBy) {
          case "titulo":
            $sql .= " ORDER BY Titulo";
          break;
          case "comentario";
            $sql .= " ORDER BY Comentario";
          break;
          case "valoracion";
            $sql .= " ORDER BY Valoracion";
          break;
        }
      }

      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateReview($id, $titulo, $comentario, $valoracion) {
      $query = $this->db->prepare("UPDATE reseñas SET Titulo = ?, Comentario = ?, Valoracion = ? WHERE Id = ?");
      $query->execute([$titulo, $comentario, $valoracion, $id]);
    }

    public function getReview($id) {
      $query = $this->db->prepare('SELECT * FROM reseñas WHERE id = ?');
      $query->execute([$id]);
      
      return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertReview($titulo,$comentario,$valoracion) {
      $query = $this->db->prepare('INSERT INTO reseñas(Titulo,Comentario,Valoracion) VALUES (?,?,?)');
      $query->execute([$titulo,$comentario,$valoracion]);
      
      return $this->db->lastInsertId();
    }
  }