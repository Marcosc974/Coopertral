<?php
session_start();
require_once './classes/ControllerUser.php';
$ccu= new ControllerUser();
$ccu->verifySession();
include_once 'classes/BairroDAO.php';
$cd = new BairroDAO();
require_once 'classes/ControllerBairro.php';
$cc = new ControllerBairro();
$cc->salvarBairro();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'navegacao.php';
            ?>
            <div class="row">
                <div class="col-md-5">
                    <?php
                    if (isset($cc->message)) {
                        echo '<div class="alert alert-info">' . $cc->message . '</div>';
                    }
                    ?>
                    <h2>Cadastro de Bairros</h2>
                    <?php
                    if (isset($_POST['opcao']) && isset($_POST['id'])) {
                        foreach ($cd->buscar($_POST['id']) as $data) {
                            ?>
                            <form method="post">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="opcao" value="editar">
                                    <input type="hidden" name="bid" value="<?= $data['bid']; ?>">
                                    <input type="text" required name="bairro" value="<?= $data['bnome'] ?>" class="form-control">
                                </div>
                                <div class="form-group col-md-12
                                     ">
                                    <button class="btn btn-primary">Salvar Edição</button>
                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        ?>
                        <form method="post">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="opcao" value="salvar">
                                <input type="text" required name="bairro" class="form-control">
                            </div>
                            <div class="form-group col-md-12
                                 ">
                                <button class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-7">

                    <h1>Bairros Cadastrados</h1>
                    <table class="table table-responsive table-bordered" id="example">
                        <thead>
                        <th>Nome</th>
                        <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            if ($cd->listar()) {
                                foreach ($cd->listar() as $c) {
                                    ?>
                                    <tr>
                                        <td><?= $c['bnome'] ?></td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?= $c['bid']; ?>">
                                                <button name="opcao" value="editar" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i> Editar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
