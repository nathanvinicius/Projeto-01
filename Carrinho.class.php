<?php
    class Carrinho{
        var $Codigo;
        var $Descricao_Produto;
        var $Quantidade;
        var $ValorUnit;
        var $Total;
        var $Imagem;
        var $TotaldaCompra;

        function AlterarQuantidade($tipo){
            if ($tipo == "mais") {
                $this -> Quantidade--;
                $this -> Total -= $this -> ValorUnit;
                
            } else{
                $this -> Quantidade++;
                $this -> Total = $this -> ValorUnit * $this -> Quantidade;
            }
        }

    }
?>