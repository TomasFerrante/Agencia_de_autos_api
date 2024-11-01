<?php 
  require_once "./app/models/ReseniaModel.php";
  require_once "./app/views/JSONView.php";

  class ReseniaController {
    private $model;
    private $view;

    public function __construct() {
      $this->model = new ReseniaModel();
      $this->view = new JSONView();
    }

    public function getReviews($req, $res) {
      $filtrarValoracion = null;
      if (isset($req->query->Valoracion)) {
        $filtrarValoracion = $req->query->Valoracion;
      }
      
      $orderBy = false;
      if (isset($req->query->orderBy)) {
        $orderBy = $req->query->orderBy;
      }

      $reviews = $this->model->getAll($filtrarValoracion, $orderBy);
      return $this->view->response($reviews);
    }

    public function update($req, $res) {
      $id = $req->params->Id;
      $review = $this->model->getReview($id);

      if (!$review) {
        return $this->view->response("No existe la reseña con el id = $id", 404);
      }

      if (empty($req->body->Titulo) || empty($req->body->Comentario) || empty($req->body->Valoracion)) {
        return $this->view->response("Faltan completar datos obligatorios", 400);
      }

      $titulo = $req->body->Titulo;
      $comentario = $req->body->Comentario;

      if ($req->body->Valoracion >= 1 && $req->body->Valoracion <= 5) {
        $valoracion = $req->body->Valoracion;
      } else {
        $this->view->response("La valoración es inválida", 400);
      }
    
      $this->model->updateReview($id, $titulo, $comentario, $valoracion);

      $review = $this->model->getReview($id);
      $this->view->response($review, 200);
    }
  }