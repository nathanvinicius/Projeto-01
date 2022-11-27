<?php
    include 'Produtos.class.php';
    include 'header.php';
    session_start();
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = null;
    }
    


    echo '
    <div class="d-flex flex-wrap justify-content-center">';
        foreach ($_SESSION['produtos'] as $chave => $valor) {
            echo '
            <div class="i card col-lg-6" style="width: 18rem;">
                <img src="'.$valor -> Imagem.'" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">'.$valor -> Descricao.'</h5>
                    <p class="card-text">R$ '.$valor -> ValorUnit.',00</p>
                    <a href="inserir_carrinho.php?codigo='.$chave.'" class="btn btn-dark">ADICIONE AO CARRINHO</a>
                </div>
            </div> 
            ';
        };

    echo'
    </div>';


    include 'footer.php';
?>