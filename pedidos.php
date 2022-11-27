<?php
    include 'header.php';
    include 'Carrinho.class.php';
    include 'Produtos.class.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carrinho";
    
    session_start();

    echo '   
    
    <div class="d-flex rounded" >
                <center>
                <table class="table" style=" background-color: white; width:700px; margin-left:150px ">
                    <thead>
                        <tr>    
                            <th scope="col" style="width: 100px"><i class="bi bi-list-ol"></i> Número do pedido</th>
                            <th scope="col" style="width: 100px; margin-left: -50px"><i class="bi bi-calendar-check"></i> Data e Hora do pedido</th>
                            <th scope="col" style="width: 100px"><i class="bi bi-eye" style="margin-left: 30px"></i> Visualizar</th>
                        </tr>
                    </thead>
                <tbody>';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $b = $_SESSION['pedido']['id_pedido'];
    intval($b);

    $a = $_SESSION['cliente']['id_cliente'];
    intval($a);

    $pedidos = array();

    $sql = "SELECT * FROM Pedidos where id_cliente = '$a'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)){
            echo '
            <tr style="height: 50px" >
                <td class="align-center"><b><p style="margin-left: 80px">'.$row['id_pedido'].'</p></b></td>
                <td class="align-center"><b><p style="margin-left: 20px">'.$row['data_time_pedido'].'</p></b></td>
                <!-- Button trigger modal -->
                <td class="align-center"><a style="margin-left: 50px" href=aa.php?id='.$row['id_pedido'].' class="btn btn-dark"><i class="bi bi-arrows-fullscreen"></i></a>
                    
                </td>  
            </tr>
            ';
        }

        echo'
            <td></td>
            </tbody>
            </table> 
            </center>         
        ';
    }

    echo'
    <div>
        <div class="rounded" style="border: 5px; background-color: white; width:410px; height: 480px; margin-left:60px; margin-right: -130px ">
            <div class="row">
                <center><h4 style="margin-left: 15px; margin-top: 10px;">Perfil</h4>
                <br>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNBNdcMDNS2r9df1IWFVc8AY0QNtfNhEJv7fGS5TdhUWrlBqfGu1PCCn9lKpL-FqF9dWc&usqp=CAU" style="width: 200px"alt="">
                </center>  
            </div>
            <div>   
                <center><h5>Nome: '.$_SESSION['cliente']['nome_completo'].'</h5>
                <h5>Email: '.$_SESSION['cliente']['email'].'</h5>
                <h5>Número de identificação: '.$_SESSION['cliente']['id_cliente'].'</h5>
                <br>
                <a href="pedidos.php" type="button" class="btn btn-dark " id="finalizar" style="width: 300px; height: 50px; margin-left: 8px; text-align: center;"><h5>Sair</h5></a>
                </center>
            </div>
        </div>
    <div>';

    
    $sql = "SELECT * FROM ItensPedidos where id_pedido =  $b";
    $result = mysqli_query($conn, $sql);

        echo'<!-- Modal -->
        <div class="modal fade" id="e'.$b.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <center>
                        <table class="table" style=" background-color: white; width:700px ">
                        <thead>
                            <tr>    
                                <th scope="col"><i class="bi bi-box"></i> Produto</th>
                                <th scope="col"><i class="bi bi-card-list"></i> Descrição</th>
                                <th scope="col"><i class="bi bi-arrow-left-right"></i> Quantidade</th>
                                <th scope="col"><i class="bi bi-cash"></i> Valor Unitario</th>
                                <th scope="col"><i class="bi bi-cash-stack"></i> valor total</th>

                            </tr>
                        </thead>
                        <tbody>';
                        
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)){
                                foreach ($_SESSION['produtos'] as $chave => $valor) {
                                    if($valor->Codigo == $row['id_produto']){
                                        echo'
                                        <tr style="height: 50px">
                                            <td><img src="'.$valor -> Imagem.'"alt="... " style="width: 6rem;"></img></td>
                                            <td class="align-middle"><b><p>'.$valor -> Descricao.'</p></b></td>
                                            <td class="align-middle"><b><p>'.$row['quantidade'].'</p></b></td>
                                            <td class="align-middle"><b>R$ '.$valor -> ValorUnit.',00</b></td>
                                            <td class="align-middle"><b>R$ '.$valor -> ValorUnit * $row['quantidade'] .',00</b></td>
                                        ';
                                        break;
                                    }
                                    
                                }
                            }
                        }
                        echo'
                        </center>
                    </div>
                </div>
            </div>
        </div>       
        ';

    include 'footer.php';
?>
