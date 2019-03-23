<?php
session_start();
require_once './classes/ControllerUser.php';
$ccu= new ControllerUser();
$ccu->verifySession();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    </body>
</html>
