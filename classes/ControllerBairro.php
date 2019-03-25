<?php

require_once 'Classes/Bairro.php';
require_once 'Classes/BairroDAO.php';

class ControllerBairro {

    var $message;

    public function salvarBairro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ba = new Bairro();
            $bd = new BairroDAO();
            switch ($_POST['opcao']) {
                case 'salvar':
                    $ba->setBnome($_POST['bairro']);
                    if ($bd->salvar($ba)) {
                        echo '<script>alert("Dados Salvos com sucesso!");location.href="bairroadm.php";</script>';
                    } else {
                        echo '<script>alert("Erro ao salvar!")</script>';
                    }
                    break;
                case 'editar':
                    if (isset($_POST['bid'])) {
                        $ba->setBid($_POST['bid']);
                        $ba->setBnome($_POST['bairro']);
                        if ($bd->atualizar($ba)) {
                            echo '<script>alert("Dados Atualizados com sucesso!");location.href="bairroadm.php";</script>';
                        } else {
                            echo '<script>alert("Erro ao salvar!")</script>';
                        }
                    }
                    break;
            }
        }
    }

}
