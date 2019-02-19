<?php
require_once '../Classes/EstabelecimentoDAO.php';
require_once '../Classes/ControllerEstabelecimento.php';

$e = new EstabelecimentoDAO();
$ce = new ControllerEstabelecimento();
$ce->status();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parceiros</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--CDN Bootstrap-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
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
                                            <a href="editarloja.php?eid=<?= $c['eid'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <?php
                                            if ($c['estatus'] == true) {
                                                ?>
                                            <button name="status" value="0" class="btn btn-success btn-xs" title="Inativar"><i class="fa fa-toggle-on"></i></button>
                                                <?php
                                            } else {
                                                ?>
                                                <button name="status" value="1" class="btn btn-warning btn-xs" title="Ativar"><i class="fa fa-toggle-off"></i></button>
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
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>
</html>


