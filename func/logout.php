<?php
   session_start();
   session_unset($_SESSION['iduser']);
   session_unset($_SESSION['nomeuser']);
   header("Location:login.php");
?>