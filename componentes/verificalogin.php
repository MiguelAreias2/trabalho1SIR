<?php
session_start();

if (!$_SESSION['iduser']) {
    header("Location:login.php");
    exit();
}
?>
