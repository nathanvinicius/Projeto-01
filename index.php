<?php
    include 'Produtos.class.php';
    session_start();

    $produto1 = new Produtos;
    $produto2 = new Produtos;
    $produto3 = new Produtos;
  
    $produto1 -> Codigo = "1";
    $produto1 -> Imagem = "https://ae01.alicdn.com/kf/S7052aaa164c442088e054e956293389eo/Keychron-Teclado-Mec-nico-sem-Fio-K8-Pro-QMK-VIA-Totalmente-Montado-Troca-a-Quente-Switch.png_.webp";
    $produto1 -> Descricao = "Teclado";
    $produto1 -> ValorUnit = 50;

    $_SESSION['produtos'][] = $produto1;

    $produto2 -> Codigo = "2";
    $produto2 -> Imagem = "https://ae01.alicdn.com/kf/S965e3ee2e75b4026a0800d49d7c3e3b3m/Recarreg-vel-mouse-sem-fio-bluetooth-mouse-computador-ergon-mico-mini-usb-mause-2-4ghz-silencioso.jpg_Q90.jpg_.webp";
    $produto2 -> Descricao = "Mouse";
    $produto2 -> ValorUnit = 20;
    
    $_SESSION['produtos'][] = $produto2;

    $produto3 -> Codigo = "3";
    $produto3 -> Imagem = "https://ae01.alicdn.com/kf/H9801f1e45c744966984b594fd43518202/Nova-chegada-impressora-de-etiquetas-4x6-desktop-impressora-de-etiquetas-de-transporte-t-rmico-compat-vel.jpg_Q90.jpg_.webp";
    $produto3 -> Descricao = "Impressora";
    $produto3 -> ValorUnit = 500;

    $_SESSION['produtos'][] = $produto3;

    $_SESSION['login'] = FALSE;

    header("Location: listar_produtos.php");
?>