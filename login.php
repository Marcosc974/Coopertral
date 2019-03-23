<!DOCTYPE html>
<?php
require_once './classes/ControllerUser.php';
$ccu = new ControllerUser();
$ccu->login();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($ccu->response)) {
            ?>
            <?= $ccu->response; ?>
            <?php }
            ?>
        <form method="POST">
            <input type="text" name="email" />
            <input type="password" name="senha"/>
            <input type="submit" value="Entrar" />
        </form>

    </body>
</html>
