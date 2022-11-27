<?php
        if(!empty($_GET['id']))
        {
            include 'header.php';
            include 'Carrinho.class.php';
            include 'Produtos.class.php';
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "carrinho";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
            }

            session_start();

            $id = $_GET['id'];
            intval($id);
       

            $sql = "SELECT * FROM ItensPedidos where id_pedido =  $id";
            $result = mysqli_query($conn, $sql);

            echo '
            <div class="d-flex rounded">
            <center>
            <table class="table" style=" background-color: white; width:700px; margin-left:150px ">
                <thead>
                    <tr>    
                        <th scope="col"><i class="bi bi-box"></i> Produto</th>
                        <th scope="col"><i class="bi bi-card-list"></i> Descrição</th>
                        <th scope="col"><i class="bi bi-arrow-left-right"></i> Quantidade</th>
                        <th scope="col"><i class="bi bi-cash"></i> Valor Unitario</th>
                        <th scope="col"><i class="bi bi-cash-stack"></i> Valor total</th>
                    </tr>
                </thead>
            <tbody>';

            $Total_Compra = 0;

            $sql = "SELECT descricao FROM Produtos where id_produto = id_produto";
            while ($row = mysqli_fetch_assoc($result)){
                $Total_Compra += $row['Total'];

                echo '
                
            <tr style="height: 50px" >
                <td><img src="'.$row['Imagem'].'"alt="... " style="width: 6rem;"></td>
                <td class="align-center"><b><p style="margin-left: 20px; margin-top: 30px">'.$row['Descricao'].'</p></b></td>
                <td class="align-center"><b><p style="margin-left: 50px; margin-top: 30px">'.$row['quantidade'].'</p></b></td>
                <td class="align-center"><b><p style="margin-left: 20px; margin-top: 30px">R$ '.$row['Valor_Unit'].',00</p></b></td>
                <td class="align-center"><b><p style="margin-left: 20px; margin-top: 30px">R$ '.$row['Total'].',00</p></b></td>
                    
            </tr>
            ';
        }

        echo'
            <td></td>
            </tbody>
            </table> 
            </center>         
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
                    <h5>Valor total do pedido: R$ '.$Total_Compra.',00</h5>
                    <br>
                    <a href="pedidos.php" type="button" class="btn btn-dark " id="finalizar" style="width: 300px; height: 50px; margin-left: 8px; text-align: center;"><h5>Sair</h5></a>
                    </center>
                </div>
            </div>
        </div>';
            
        


        }



?>