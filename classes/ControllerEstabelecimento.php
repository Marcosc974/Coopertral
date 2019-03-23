<?php

require_once 'Estabelecimento.php';
require_once 'EstabelecimentoDAO.php';
require_once 'Upload.php';
class ControllerEstabelecimento {

    var $cadastrar;
    var $buscar;

    public function cadastrar() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['cadastrar']) {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
                CURLOPT_POSTFIELDS => [
                    'secret' => '6LcboIwUAAAAAEt5VNM2gqcfyyH_oH6gnqO4Ahr6',
                    'response' => $_POST['g-recaptcha-response'],
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ]
            ]);

            $response = json_decode(curl_exec($curl));
            curl_close($curl);
            if ($response->success == true) {

                if (isset($_POST['enome']) && isset($_POST['ecategory']) && isset($_POST['eadress']) && isset($_POST['edistrict']) && isset($_POST['eterms'])) {
                    $e = new Estabelecimento();
                    $edao = new EstabelecimentoDAO();

                    $e->setEnome($_POST['enome']);
                    $e->setEcategoria($_POST['ecategory']);
                    $e->setEtelefone($_POST['ephone']);
                    if ($edao->verificaCadastro($_POST['eemail'])) {
                        $e->setEemail($_POST['eemail']);
                    } else {
                        echo "<script>alert('O email Já está sendo Utilizado.');"
                        . "window.history.back();</script>";
                    }
                    $e->setEsite($_POST['esite']);
                    $e->setElink($_POST['emaps']);
                    $e->setEendereco($_POST['eadress']);
                    $e->setEbairro($_POST['edistrict']);
                    $e->setEdescricao($_POST['edescribe']);
                    $e->setEterms($_POST['eterms']);
                } else {
                    return $this->cadastrar = "Verifique o preenchimento dos campos e tente novamente";
                }
                if (isset($_FILES['imagem'])) {
                    $foto = $_FILES['imagem'];
                    if ($foto['name']) {
                        $up = new Upload();
                        $e->setEimagem($up->enviarArquivo());
                    }
                }

                return $this->cadastrar = $edao->salvar($e);
            } else {
                return $this->cadastrar = "O Recapcha deve ser marcado!.";
            }
        }
    }

    public function buscar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['nome'])) {

            $edao = new EstabelecimentoDAO();
            $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $district = filter_input(INPUT_POST, 'bairro', FILTER_VALIDATE_INT);
            $category = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

            if (!isset($name) || $name == "") {
                $name = 'null';
            }
            return $this->buscar = $edao->catalogar($district, $category, $name);
        }
    }

    public function status() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edao = new EstabelecimentoDAO();
            if (isset($_POST['eid']) && isset($_POST['status'])) {
                return $edao->alterarStatus(intval($_POST['status']), intval($_POST['eid']));
            }
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $e = new Estabelecimento();
            $edao = new EstabelecimentoDAO();
            $e->setEid($_POST['eid']);
            $e->setEnome($_POST['enome']);
            $e->setEcategoria($_POST['ecategory']);
            $e->setEtelefone($_POST['ephone']);
            $e->setEemail($_POST['eemail']);
            $e->setEsite($_POST['esite']);
            $e->setElink($_POST['emaps']);
            $e->setEendereco($_POST['eadress']);
            $e->setEbairro($_POST['edistrict']);
            $e->setEdescricao($_POST['edescribe']);

            if (isset($_FILES['imagem'])) {
                $foto = $_FILES['imagem'];
                if ($foto['name']) {
                    require_once '../admin/Uploads.php';
                    $up = new Uploads();
                    $e->setEimagem($up->enviarArquivo());
                    $edao->trocarFoto($e);
                }
            }
            if ($edao->update($e)) {
                header("location:parceiros.php");
            } else {
                echo '<script>alert("A Atualização não pôde ser realizada tente novamente mais tarde!")</script>';
                header("Location:parceiros.php");
            }
        }
    }

}
