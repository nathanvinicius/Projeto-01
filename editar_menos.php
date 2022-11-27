<?php
    include 'Carrinho.class.php';
    session_start();

    $_SESSION['carrinho'][$_GET['codigo']] -> AlterarQuantidade("menos");

    header("Location: listar_carrinho.php");
?>