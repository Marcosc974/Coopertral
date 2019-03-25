<?php
session_start();
require_once 'classes/ControllerUser.php';
$ccu= new ControllerUser();
$ccu->verifySession();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="margin: 0 auto;width: 80%;">
        <?php require_once 'navegacao.php';?>
        <h1>Seja Bem Vindo: <span style="color:red;"><?=$ccu->data?></span></h1>
        <h3>Aqui você poderá:</h3>
        <ol type="A">
            <li>Editar os dados do seu comércio</li>
            <li>Editar a sua galeria de fotos.</li>
            <li>Ver quantas pessoas Visitaram no seu link.</li>
        </ol>
    </body>
</html>
