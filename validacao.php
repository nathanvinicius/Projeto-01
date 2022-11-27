<?php
    session_start();
    if ($_SESSION['login'] == FALSE) {
        header("Location: login.php");
        
    } elseif ($_SESSION['login'] == TRUE) {
        header("Location: confirmacao.php");
    }

?>