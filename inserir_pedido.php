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

    $sql = "INSERT INTO pedidos (id_cliente, data_time_pedido) VALUES ($a, NOW())";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM Pedidos where id_cliente = '$a'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['pedido'] = $row;
        }}

        $b = $_SESSION['pedido']['id_pedido'];
        intval($b);

    
        foreach ($_SESSION['carrinho'] as $chave => $valor) {
            $sql = "INSERT INTO itensPedidos (id_pedido, id_produto, quantidade, Valor_Unit, Total, Descricao, Imagem) VALUES ($b,$valor->Codigo ,$valor->Quantidade, $valor->ValorUnit, $valor->Total, '$valor->Descricao_Produto', '$valor->Imagem')";

            if (mysqli_query($conn, $sql)) {
                header ('location: finalizacao.php');
            }
        }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    mysqli_close($conn);

?>