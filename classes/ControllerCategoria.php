<?php

require_once 'Classes/Categoria.php';
require_once 'Classes/CategoriaDAO.php';

class ControllerCategoria {

    var $message;

    public function salvarCategoria() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ca = new Categoria();
            $cd = new CategoriaDAO();
            switch ($_POST['opcao']) {
                case 'salvar':
                    $ca->setCnome($_POST['categoria']);

                    if ($cd->salvar($ca)) {
                        echo '<script>alert("Dados Salvos com sucesso!");location.href="categoriaadm.php";</script>';
                    } else {
                        echo '<script>alert("Erro ao salvar!")</script>';
                    }
                    break;
                case 'editar':
                    if (isset($_POST['cid'])) {
                        $ca->setCid($_POST['cid']);
                        $ca->setCnome($_POST['categoria']);
                        if ($cd->atualizar($ca)) {
                            echo '<script>alert("Dados Atualizados com sucesso!");location.href="categoriaadm.php";</script>';
                        } else {
                            echo '<script>alert("Erro ao salvar!")</script>';
                        }
                    }
                    break;
            }
        }
    }

}
