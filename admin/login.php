<?php
require_once '../classes/ControllerUser.php';
$ccu = new ControllerUser();
$ccu->login();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Coopertral</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/login.css" rel="stylesheet"/>
        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    
                    <form class="form-signin" method="post">
                        <div class="text-center">
                            <a href="#">
                                <img width="200" class="mb-4" src="../images/logo-green.svg" alt="logo-coopertral" title="Voltar para o site"></a>
                            <br/>
                            <br/>
                            
                            <?php
                            if (isset($ccu->response)) {
                                ?>
                                <div class="alert alert-danger"><?= $ccu->response; ?></div>
                            <?php }
                            ?>
                        </div>

                        <div class="form-group">

                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>

                        </div>

                        <div class="form-group">

                            <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>

                        </div>
                        <button class="btn btn-success btn-block btn-fill" type="submit"><i class="pe-7s-paper-plane"></i> Entrar</button>
                        <smal><a href="#">Esqueci a Senha</a></smal>
                    </form>
                </div>
            </div>
        </div>  
    </body>
</html>