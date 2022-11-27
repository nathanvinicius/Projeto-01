<?php
    // Colocar Dentro de um metodo

    include 'Carrinho.class.php';
    session_start();  
    unset($_SESSION['carrinho'][$_GET['codigo']]);
    header("Location: listar_carrinho.php");
?>