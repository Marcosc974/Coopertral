<?php
if (isset($_POST['login']) && isset($_POST['senha'])) {
    if ($_POST['login'] == 'contato@coopertral.com.br' && $_POST['senha'] == 'Contato@adm') {
        session_start();
        $_SESSION['login'] = "logado";
        header("location:administracao.php");
    }
}?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administração</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--CDN Bootstrap-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
        <style>
            .login{
                margin:0 auto;
                width: 400px;
                margin-top: 15%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="login">
                <h1 class="text-success text-center">PAINEL</h1>
                <form method="post">
                    <div class="form-group">
                        <input type="mail" name="login" class="form-control" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success form-control"><i class="fa fa-location-arrow"></i> Acessar Painel</button>
                        <a class="form-control btn btn-danger" href="http://www.cooperativacoopertral.com.br">Voltar ao site</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

