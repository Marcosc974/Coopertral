<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != 'logado') {
    header("location:index.php");
}

