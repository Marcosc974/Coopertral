<?php
session_start();
require_once 'classes/ControllerUser.php';
$ccu= new ControllerUser();
$ccu->verifySession();
require_once 'Classes/EstabelecimentoDAO.php';
require_once 'Classes/ControllerEstabelecimento.php';

$e = new EstabelecimentoDAO();
$ce = new ControllerEstabelecimento();
$ce->status();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parceiros</title>
        
    </head>
    <body>
        <div class="container">
            <?php
            require_once './navegacao.php';
            ?>
            <div class="row">
                <h1>Parceiros Cadastrados</h1>
                <table class="table table-responsive table-bordered" id="example">
                    <thead>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($e->listarAdm()) {
                            foreach ($e->listarAdm() as $c) {
                                ?>
                                <tr>
                                    <td><?= $c['enome'] ?></td>
                                    <td><?= $c['eendereco'] ?></td>
                                    <td><?= $c['etelefone'] ?></td>
                                    <td><?= $c['eemail'] ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="eid" value="<?= $c['eid']; ?>">
                                            <a href="editarloja.php?eid=<?= $c['eid'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                            <?php
                                            if ($c['estatus'] == true) {
                                                ?>
                                            <button name="status" value="0" class="btn btn-success btn-xs" title="Inativar"><i class="fa fa-toggle-on"></i> Inativar</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button name="status" value="1" class="btn btn-warning btn-xs" title="Ativar"><i class="fa fa-toggle-off"></i> Ativar</button>
                                                    <?php
                                                }
                                                ?>
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
        
    </body>
</html>


