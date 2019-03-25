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
        <h1>Aqui você poderá editar a sua galeria de fotos.</h1>
    </body>
</html>
