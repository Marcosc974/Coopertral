<?php
session_start();
require_once 'classes/ControllerUser.php';
$ccu= new ControllerUser();
$ccu->verifySession();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'navegacao.php';
        ?>
        <form method="POST">
            Nome: <input type="text" name="nome"/>
            Senha: <input type="text" name="senha"/>
            <input type="submit" value="Atualizar dados" />
        </form>
    </body>
</html>
