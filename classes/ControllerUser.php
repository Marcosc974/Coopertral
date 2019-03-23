<?php

require_once 'Usuario.php';
require_once 'UsuarioDAO.php';

class ControllerUser {

    var $response;

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['email']) && isset($_POST['email'])) {

            $u = new Usuario();
            $ud = new UsuarioDAO();
            $u->setUemail(trim($_POST['email']));

            if ($u->getUemail()) {

                $row = $ud->buscarLogin($u);

                if ($row[0]['uemail']) {

                    $u->setUsenha($_POST['senha']);
                    if (password_verify($u->getUsenha(), $row[0]['usenha'])) {
                        session_start();
                        $_SESSION['logado'] = $row[0]['unome'];
                        $_SESSION['perfil'] = $row[0]['uperfil'];

                        header("location:minhapagina.php");
                    }
                    return $this->response = "Login ou senha Inválidos!.";
                }
                return $this->response = "Informações não existentes em nosso banco de dados!";
            }
            return $this->response = "Este não é um e-mail válido";
        }
        return $this->response = "Preencha os campos corretamente";
    }

    public function verifySession() {
        if (!isset($_SESSION['logado'])) {
            session_destroy();
            header("location:login.php");
        }
    }

}
