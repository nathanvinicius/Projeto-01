<?php
    include 'Pedido.class.php';
    session_start();

    $r = $_SESSION['pedidos'][$_GET['codigo']];

    print_r($r);
    return;

   
?>