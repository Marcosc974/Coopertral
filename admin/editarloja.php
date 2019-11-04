<?php
session_start();
require_once '../classes/ControllerUser.php';
$ccu = new ControllerUser();
$ccu->verifySession();
require_once '../Classes/EstabelecimentoDAO.php';
require_once '../Classes/ControllerEstabelecimento.php';
require_once '../Classes/CategoriaDAO.php';
require_once '../Classes/BairroDAO.php';

if (isset($_SESSION['eid'])) {
    $eid = intval($_SESSION['eid']);
} else {
    $eid = intval($_GET['eid']);
}
$edao = new EstabelecimentoDAO();
$data = $edao->store($eid);
$ce = new ControllerEstabelecimento();
$ce->editar();
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Coopertral</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />
    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Coopertral
                        </a>
                    </div>
                    <!--Aqui vai o menu-->
                    <?php
                    require_once "menu.php";
                    ?>
                    <!--Fim menu-->
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--nome user-->
                            <?php
                            require_once "validacao.php";
                            ?>
                            <!--Fim nome user-->
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="logoff.php">
                                        <i class="pe-7s-power"></i> Sair
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <div class="header">
                            <h2 class="title">Meu Estabelecimento</h2>
                        </div>
                        <div class="card">  
                            <div class="content">
                                <form enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="eid" value="<?= $data[0]['eid'] ?>">

                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="form-goup col-md-4">
                                            <?php
                                            if ($data[0]['eimagem'] == NULL || !isset($data[0]['eimagem'])) {
                                                echo '<img class="thumbnail" width=300 src="../images/teste.svg">';
                                            } else {
                                                echo '<img class="thumbnail" width=300 src="../fotos/' . $data[0]['eimagem'] . '">';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                            </div>
                            <div class="row">
                                <div class="form-goup col-md-12">
                                    <label for="enome">Nome</label>
                                    <input class="form-control" type="text" value="<?= $data[0]['enome']; ?>" name="enome">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-goup col-md-4">
                                    <label for="enome">Telefone Comercial</label>
                                    <input class="form-control" type="text" name="enome" value="<?= $data[0]['etelefone']; ?>">
                                </div>
                                <div class="form-goup col-md-4">
                                    <label for="enome">Endereço</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-goup col-md-4">
                                    <label for="enome">E-mail</label>
                                    <?php if (isset($_SESSION['eid'])): ?>
                                        <input id="mail" name="eemail" type="email" value="<?= $data[0]['eemail']; ?>" class="form-control" disabled>
                                    <?php else:
                                        ?>
                                        <input id="mail" name="eemail" type="email" value="<?= $data[0]['eemail']; ?>" class="form-control">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-goup col-md-6">
                                    <label for="enome">Categoria</label>
                                    <select class="form-control">
                                        <?php
                                        $categoria = new CategoriaDAO();
                                        foreach ($categoria->listar() as $ca) {
                                            if ($ca['cnome'] == $data[0]['cnome']) {
                                                ?>
                                                <option selected value="<?= $ca['cid']; ?>"><?= $ca['cnome']; ?></option>
                                                <?php
                                            } elseif ($ca['cnome'] != $data[0]['cnome']) {
                                                ?>
                                                <option value="<?= $ca['cid']; ?>"><?= $ca['cnome']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-goup col-md-6">
                                    <label for="enome">Bairro</label>
                                    <select class="form-control">
                                        <?php
                                        $bairro = new BairroDAO();
                                        foreach ($bairro->listar() as $ba) {
                                            if ($ba['bnome'] == $data[0]['bnome']) {
                                                ?>
                                                <option selected value="<?= $ba['bid']; ?>"><?= $ba['bnome']; ?></option>
                                            <?php } elseif ($ba['bnome'] != $data[0]['bnome']) {
                                                ?>
                                                <option value="<?= $ba['bid']; ?>"><?= $ba['bnome']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-goup col-md-6">
                                    <label for="enome">Endereço</label>
                                    <input type="text" class="form-control" value="<?= $data[0]['eendereco']; ?>">
                                </div>
                                <div class="form-goup col-md-6">
                                    <label for="enome">Link do Google maps</label>
                                    <textarea class="form-control"><?= $data[0]['elink']; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-goup col-md-12">
                                    <label for="enome">Site</label>
                                    <input type="text" class="form-control" value="<?= $data[0]['esite']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-goup col-md-12">
                                    <label for="enome">Sobre</label>
                                    <textarea class="form-control"><?= $data[0]['edescricao']; ?></textarea>
                                </div>
                            </div>
                            <br/>

                            <input class="form-control-file" id="imagem" name="imagem" type="file">
                            <label for="imagem"><small>Escolha imagens com no máximo 4MB</small></label><br/>
                            <button type="submit" class="btn btn-success btn-fill"><i class="pe-7s-refresh"></i> Atualizar Dados</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--Rodapé-->
            <?php
            require_once "footer.php";
            ?>
            <!--Fim rodapé-->
        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>
