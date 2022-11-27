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
                <center><b><p style="font-size: 17px; color: rgb(85, 85, 85);">Carrinho</b> > Confirmação > Pagamento > Pedido Completo</p></center> 
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
                            <th scope="col" style="width: 70px"><i class="bi bi-check2-circle" style="margin-left: -20px"></i> Ações</th>
                        </tr>
                    </thead>
                <tbody>';
                foreach ($_SESSION['carrinho'] as $chave => $valor) { 
                    echo '
                        <tr style="height: 100px">
                            <td><img src="'.$valor -> Imagem.'"alt="... " style="width: 6rem;"></td>
                            <td class="align-middle"><b><p>'.$valor->Descricao_Produto.'</p></b></td>
                            <td class="align-middle">
                                <div class="d-flex">
                                    <div >
                                        <a href="editar_mais.php?codigo='.$chave.'" type="button" style="margin-top: 5px; margin-left: -10px" class="btn btn-dark" ><b><i class="bi bi-dash-lg"></i></b></a>
                                    </div>
                                        
                                    <div style="margin-top: 10px; margin-bottom: 10px; margin-left: 15px; margin-right: 15px" class="text-align-center">
                                        <b><p>'.$valor->Quantidade.'</p></b>
                                    </div>
                                    
                                    <div >
                                        <a href="editar_menos.php?codigo='.$chave.'" type="button" style="margin-top: 5px; margin-left: 5px" class="btn btn-dark" ><b><i class="bi bi-plus-lg"></i></b></a>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="align-middle"><b><p style="margin-left: 30px;">R$ '.$valor->ValorUnit.',00</p></b></td>
                            <td class="align-middle"><b><p>R$ '.$valor->Total.',00</p></b></td>
                            

                            <!-- Button trigger modal -->
                            <td class="align-middle"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#e'.$chave.'">
                                <i class="bi bi-trash"></i>
                            </td>


                            <!-- Modal -->
                            <div class="modal fade" id="e'.$chave.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 " id="exampleModalLabel">Deseja realmente remover o produto do carrinho?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <center><img src="https://media.tenor.com/3raqOHtuQ_wAAAAj/sad-cry.gif" style="margin-left:-40px" alt=""></center>
                                    </div>
                                    <div class="modal-footer">
                                        
                                            <a href="excluir_carrinho.php?codigo='.$chave.'"class="btn btn-danger">SIM</a>
                                            
                                    
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">NÃO</button>
                                    </div>
                                    </div>
                                </div>
                            </div>                 
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
                        <center><a href="validacao.php" type="button" class="btn btn-dark " id="finalizar" style="width: 300px; height: 50px; margin-left: 8px; text-align: center;"><h5>Compre agora</h5></a>
                        <br>
                        <br>
                        <p style="font-size: 15px;">Aplique um codigo de cupom na proxima etapa.</p>
                        <span style="margin-top: 10px;"></span>
                        </center>
                    </div>
                </div>  
                

                <div class="rounded" style="border: 5px; background-color: white; width:410px; height: 220px; margin-left:60px; margin-right: -100px ">
                    
                    <h4 style="margin-left: 10px; margin-top: 20px;">Formas de Pagamento</h4>
                    
                    <div style="margin: 10px; margin-top: 10px; margin-left:10px">
                            <img src="https://img.ltwebstatic.com/images2_pi/2018/06/06/15282732803587566708.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">
                            <img src="https://img.ltwebstatic.com/images3_pi/2021/03/09/161528368123dd7a35ad8708b0dfc74b3630526891.webp" alt="" style="width: 55px; margin: 8px;">
                            <img src="https://img.ltwebstatic.com/images2_pi/2018/06/06/15282732983375743706.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">


                            <img src="https://img.ltwebstatic.com/images2_pi/2018/06/06/1528273036537082707.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">
                            <img src="https://img.ltwebstatic.com/images2_pi/2018/11/14/1542165929465511500.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">

                            <img src="https://img.ltwebstatic.com/images2_pi/2018/11/14/15421659553667383771.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">
                            <img src="https://img.ltwebstatic.com/images2_pi/2018/08/15/1534311470399498284.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">
                            <img src="https://img.ltwebstatic.com/images2_pi/2018/06/06/15282733431754785346.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">

                            <img src="https://img.ltwebstatic.com/images2_pi/2019/05/14/15578224212830489885.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">
                            <img src="https://img.ltwebstatic.com/images3_pi/2021/08/10/16285753252c1e710a326167c3218f7485c76887a8.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">
                            <img src="https://img.ltwebstatic.com/images3_pi/2021/08/16/1629098490065621dbfe5a3e1fc57f1e654a60f4a0.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">

                            <img src="https://img.ltwebstatic.com/images3_pi/2021/03/24/16165701532b8641ac68300d87e3408f638f11df9f.webp" alt="" style="width: 55px; margin: 8px; margin-left: 23px">        
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <h1 style="margin-left: -140px">
                <button style="margin-left:900px" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-trash"></i> Limpar Carrinho </i>
                </button><br></br> 
    </h1>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja realmente apagar todo o carrinho?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center><img src="https://media.tenor.com/3raqOHtuQ_wAAAAj/sad-cry.gif" style="margin-left:-40px" alt=""></center>
                    </div>
                    <div class="modal-footer">
                        <a href="limpar_carrinho.php" class="btn btn-danger">SIM</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">NÃO</button>
                    </div>
                    </div>
                </div>
            </div>
        ';
        }  else {
            echo '
            <center>
                <img src="https://i.ibb.co/SrrNTfY/Design-sem-nome.png" style=" width: 1150px">
            </center> 
            <center>
                <a href="listar_produtos.php" class="btn btn-dark" ><i class="fa-sharp fa-solid fa-face-smile"></i> Ir às compras</a>
            </center>';
            
        } 
        
        include 'footer.php'  
    ?>

