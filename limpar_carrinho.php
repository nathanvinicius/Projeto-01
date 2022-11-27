<?php
    // Colocar Dentro de um metodo
    include 'Carrinho.class.php';

    session_start();
	$_SESSION['carrinho'] = null;
    
    header("Location: listar_carrinho.php");
?>