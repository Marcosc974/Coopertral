<?php
require_once './validacao.php';
include_once '../Classes/Conexao.php';
include_once '../Classes/BairroDAO.php';
$cd = new BairroDAO();
require_once '../Classes/ControllerBairro.php';
$cc = new ControllerBairro();
$cc->salvarBairro();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
                                                <button name="opcao" value="editar" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>
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
