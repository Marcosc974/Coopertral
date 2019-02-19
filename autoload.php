<?php
spl_autoload_register("pegarClasse");
function pegarClasse($classe) {
    if (file_exists("Classes" . DIRECTORY_SEPARATOR . $classe . ".php") === true) {
        require_once("Classes" . DIRECTORY_SEPARATOR . $classe . ".php");
            }
}
?>
