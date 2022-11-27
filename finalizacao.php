<?php
    include 'header.php';
    session_start();
    
    $c = $_SESSION['pedido']['id_pedido'];
    intval($c);

    echo '
    <h1 style="margin-bottom: 50px;">
    <center><p style="font-size: 17px; color: rgb(85, 85, 85);">Carrinho > Confirmação  > <b> Pedido Completo</b></p></center> 
    </h1> ';
    echo '<h1><center>Pedido de número <b style="color: rgb(50,205,50)">'.$c.'</b> confirmado</center></h1>';
    
    echo'<center><img src="https://i.ibb.co/tP4vgy6/Inserir-um-t-tulo.gif" style="margin-left:-20px; width: 900px"alt=""></center>';
    echo '  <center>
    <a href="listar_produtos.php" class="btn btn-dark" ><i class="fa-sharp fa-solid fa-face-smile"></i> Voltar às compras</a>
    <a href="listar_carrinho.php" class="btn btn-dark" ><i class="fa-sharp fa-solid fa-face-smile"></i> Ir ao carrinho</a>
    <a href="pedidos.php" class="btn btn-dark" ><i class="fa-sharp fa-solid fa-face-smile"></i> Ver pedidos</a>
    </center>';

    $_SESSION['carrinho'] = null;
    include 'footer.php';
?>