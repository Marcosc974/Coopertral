<?php
require_once './validacao.php';
require_once '../Classes/EstabelecimentoDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   </head>
    <body>
        <div class="container">
            <?php
            require_once './navegacao.php';
            ?>
            <br/>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-lg-2 mb-2">
                    <a href="parceiros.php">
                    <div  class="text-center bg-primary text-white" style="width: 100%;height: 100%;">
                    <p>Parceiros Ativos</p>
                    <?php
                    $p= new EstabelecimentoDAO();
                    $qtd = $p->contar();
                    ?>
                    <h3><?=$qtd[0];?></h3>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-2 mb-2">
                    <div style="width: 100%;height: 100%;">oi</div>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-2 mb-2">
                    <div style="width: 100%;height: 100%;">oi</div>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-2 mb-2">
                    <div style="width: 100%;height: 100%;">oi</div>
                </div>
            </div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
    </body>
</html>




