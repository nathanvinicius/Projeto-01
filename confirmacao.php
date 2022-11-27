<?php
    include 'Carrinho.class.php';
    include 'header.php';
    session_start();

    $Total_Compra = 0;
        $Quantidade_Itens = 0;

        if($_SESSION['carrinho'] != null){
            foreach ($_SESSION['carrinho'] as $chave => $valor) {
                $Total_Compra += $valor -> Total;
                
            }
                echo '
            <h1 style="margin-bottom: 50px;">
                <center><p style="font-size: 17px; color: rgb(85, 85, 85);">Carrinho > <b> Confirmação </b> > Pedido Completo</p></center> 
            </h1> 
               
            <div class="d-flex rounded" >
                <table class="table" style="margin-left:-170px; height: 200px; background-color: white;">
                    <thead>
                        <tr>    
                            <th scope="col" style="width: 100px"><i class="bi bi-box"></i> Produto</th>
                            <th scope="col" style="width: 300px"><i class="bi bi-card-list"></i> Descrição</th>
                            <th scope="col" style="width: 170px"><i class="bi bi-arrow-left-right" style="margin-left: 10px"></i> Quantidade</th>
                            <th scope="col" style="width: 170px"><i class="bi bi-cash"></i> Valor Unitario</th>
                            <th scope="col" style="width: 150px"><i class="bi bi-cash-stack"></i> Total</th>
                       
                        </tr>
                    </thead>
                <tbody>';
                foreach ($_SESSION['carrinho'] as $chave => $valor) { 
                    echo '
                        <tr style="height: 100px">
                            <td><img src="'.$valor -> Imagem.'"alt="... " style="width: 6rem;"></td>
                            <td class="align-middle"><b><p>'.$valor->Descricao_Produto.'</p></b></td>
                            <td class="align-middle"><b><p>'.$valor->Quantidade.'</p></b></td>
                        
                            
                            <td class="align-middle"><b><p style="margin-left: 30px;">R$ '.$valor->ValorUnit.',00</p></b></td>
                            <td class="align-middle"><b><p>R$ '.$valor->Total.',00</p></b></td>
                            

                            
                        </tr>          
                    ';
                    $Quantidade_Itens += $valor -> Quantidade;
                }
                echo '
                <tr>
                <th></th>
                </tr>
                </tbody>
                </table>
            <div>
                <div class="rounded" style="border: 5px; background-color: white; width:410px; height: 300px; margin-left:60px; margin-right: -130px ">
                    <div class="row">
                        <h4 style="margin-left: 15px; margin-top: 10px;">Resumo do Pedido</h4>
                        
                        <div class="col d-flex" style=""><p style="font-size: 15px;">Quantidade de Itens</p></div> 
                        <div class="col" style="margin-left: 250px; margin-top: 10px;"><b>'.$Quantidade_Itens.'</b></div>  

                        <div class="col d-flex" style="margin-top: 3px;"><p style="font-size: 15px;">Subtotal</p></div> 
                        <div class="col" style="margin-left: 180px; margin-top: 3px;"><b>R$ '.$Total_Compra.',00</b></div>        
                    </div>
                    <div>
                        <center><a href="inserir_pedido.php" type="button" class="btn btn-dark " id="finalizar" style="width: 300px; height: 50px; margin-left: 8px; text-align: center;"><h5>Confirmar compra</h5></a>
                        <br>
                        <br>
                        <p style="font-size: 15px;">Aplique um codigo de cupom na proxima etapa.</p>
                        <span style="margin-top: 10px;"></span>
                        </center>
                    </div>
                </div>  
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Seu pedido foi confirmado!!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <center><img src="https://i.ibb.co/tP4vgy6/Inserir-um-t-tulo.gif" style="margin-left:-20px" alt=""></center>
        </div>
        <div class="modal-footer">
            <a href="limpar_carrinho.php" class="btn btn-danger">Fechar</a>
            
        </div>
        </div>
    </div>
    </div> ';
            }
        
    

    include 'footer.php';
?>

