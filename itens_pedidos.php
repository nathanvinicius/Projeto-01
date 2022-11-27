<?php 
    include 'Carrinho.class.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carrinho";

    session_start();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    $a = $_SESSION['cliente']['id_cliente'];
    intval($a);

    $sql = "SELECT * FROM Pedidos where id_cliente = '$a'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = TRUE; 

        while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['pedido'] = $row;
    }}

    $b = $_SESSION['pedido']['id_pedido'];
    intval($b);

    foreach ($_SESSION['carrinho'] as $chave => $valor) {

    $sql = "INSERT INTO itenspedidos (id_pedido, id_peoduto, quantidade) VALUES ($b,$valor->Codigo ,$valor->Quantidade)";
}
    if (mysqli_query($conn, $sql)) {
        echo('oi');
    } 

?>