<?php
require_once './app/models/UsuarioModel.php';
require_once './app/views/JSONView.php';
require_once './libs/jwt.php';

class UsuarioController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new JSONView();
    }

    public function getToken() {
        $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
        $auth_header = explode(' ', $auth_header);
        
        if(count($auth_header) != 2) {
            return $this->view->response("Error en los datos ingresados", 400);
        }
        
        if($auth_header[0] != 'Basic') {
            return $this->view->response("Error en los datos ingresados", 400);
        }
        
        $user_pass = base64_decode($auth_header[1]);
        $user_pass = explode(':', $user_pass);
        
        $user = $this->model->getUsuarioByUsuario($user_pass[0]);
        if($user == null || !password_verify($user_pass[1], $user->Contraseña)) {
            return $this->view->response("Error en los datos ingresados", 400);
        }

        $token = createJWT(array(
            'sub' => $user->ID_Usuario,
            'usuario' => $user->Usuario,
            'role' => 'admin',
            'iat' => time(),
            'exp' => time() + 120,
        ));

        return $this->view->response($token);
    }
}