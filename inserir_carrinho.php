<?php
    include 'Carrinho.class.php';
    include 'Produtos.class.php';
    session_start();

    if (empty($_SESSION['carrinho'])) {
        $produto = new Carrinho;
            
            $produto -> Codigo = $_SESSION['produtos'][$_GET['codigo']] -> Codigo;
            $produto -> Descricao_Produto = $_SESSION['produtos'][$_GET['codigo']] -> Descricao;
            $produto -> Quantidade = 1;
            $produto -> ValorUnit =  $_SESSION['produtos'][$_GET['codigo']] -> ValorUnit;
            $produto -> Total =  $_SESSION['produtos'][$_GET['codigo']] -> ValorUnit;
            $produto -> Imagem = $_SESSION['produtos'][$_GET['codigo']] -> Imagem;
        
            $_SESSION['carrinho'][] = $produto;
    }else {
        
        $validade = false;
        foreach ($_SESSION['carrinho'] as $chave => $valor) {

           
            if ($valor-> Codigo == $_SESSION['produtos'][$_GET['codigo']] -> Codigo) {
                
                $_SESSION['carrinho'][$chave] -> AlterarQuantidade("menos");
                $validade = true;
                break;
                
            }
        }
        
        if($validade == false){
            $produto = new Carrinho;
            
            $produto -> Codigo = $_SESSION['produtos'][$_GET['codigo']] -> Codigo;
            $produto -> Descricao_Produto = $_SESSION['produtos'][$_GET['codigo']] -> Descricao;
            $produto -> Quantidade = 1;
            $produto -> ValorUnit =  $_SESSION['produtos'][$_GET['codigo']] -> ValorUnit;
            $produto -> Total =  $_SESSION['produtos'][$_GET['codigo']] -> ValorUnit;
            $produto -> Imagem = $_SESSION['produtos'][$_GET['codigo']] -> Imagem;
        
            $_SESSION['carrinho'][] = $produto; 
        }
    }
       


    header("Location: listar_produtos.php");
?>